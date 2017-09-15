<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutLoginRequest;
use Illuminate\Support\MessageBag;
use App\Http\Requests\CheckoutAddressRequest;
use App\Address;
use App\Product;
use App\Support\CartService;
use App\Order;
use App\OrderDetail;
use Sentinel;

class CheckoutController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;

    //     $this->middleware('checkout.have-cart', [
    //         'only' => ['login', 'postLogin', 'address', 'postAddress',
    //         'payment', 'postPayment']
    //     ]);
    //
    //     $this->middleware('checkout.login-step-done', [
    //         'only' => ['address', 'postPayment',
    //         'payment', 'postPayment']
    //     ]);
    //
    //     $this->middleware('checkout.address-step-done', [
    //         'only' => ['payment', 'postPayment']
    //     ]);
    //
    //     $this->middleware('checkout.payment-step-done', [
    //         'only' => ['success']
    //     ]);
    }

    public function login()
    {
        if (Sentinel::check()) {
            return redirect('/checkout/address');
        } else {
            return view('checkout.login');
        }
    }

    public function postLogin(CheckoutLoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('checkout_password');
        $is_guest = $request->get('is_guest') > 0;

        if ($is_guest) {
            return $this->guestCheckout($email);
        }

        return $this->authenticatedCheckout($email, $password);
    }

    protected function guestCheckout($email)
    {
        // check if user exist, if so, ask login
        if ($user = Sentinel::where('email', $email)->first()) {
            if ($user->hasPassword()) {
              // (A) Logic ketika email ada di DB dengan password
              $errors = new MessageBag();
              $errors->add('checkout_password', 'Email Address "' . $email . '" has no password.');
              // redirect and change is_guest value
              return redirect('checkout/login')->withErrors($errors)
                  ->withInput(compact('email') + ['is_guest' => 0]);
            }
            // (B) Logic ketika email di DB tanpa password
            // show view to request new password
            session()->flash('email', $email);
            return view('checkout.reset-password');
        }
        // (C) Logic ketika email tidak ada di DB
        // save user data to session
        session(['checkout.email' => $email]);
        return redirect('checkout/address');
    }

    protected function authenticatedCheckout($email, $password)
    {
        // login
        if (!Sentinel::forceAuthenticate([
          'email'=>$email,
          'password'=>$password
        ])) {
            // Authentication failed..
            $errors = new MessageBag();
            $errors->add('email', 'Incorrect User Details');
            return redirect('checkout/login')
                ->withInput(compact('email', 'password') + ['is_guest' => 0])
                ->withErrors($errors);
        }

        // logged in, merge cart (destroy cart cookie)
        $deleteCartCookie = $this->cart->merge();
        return redirect('checkout/address')->withCookie($deleteCartCookie);
    }

    public function address()
    {
        return view('checkout.address');
    }

    public function postAddress(Request $request)
    {
        $user_id = Sentinel::getUser()->id;

        $address = new Address();

        $address->user_id = $user_id;
        $address->name = $request->input('name');
        $address->detail = $request->input('detail');
        $address->city = $request->input('city');
        $address->phone = $request->input('phone');
        $address->save();

        // dd($address);
        return redirect('checkout/payment');

    }

    protected function authenticatedAddress(CheckoutAddressRequest $request)
    {
        $address_id = $request->get('address_id');
        // clear old
        session()->forget('checkout.address');
        if ($address_id == 'new-address') {
            $this->saveAddressSession($request);
        } else {
            session(['checkout.address.address_id' => $address_id]);
        }
        return redirect('checkout/payment');
    }

    protected function guestAddress(CheckoutAddressRequest $request)
    {
        $this->saveAddressSession($request);
        return redirect('checkout/payment');
    }

    protected function saveAddressSession(CheckoutAddressRequest $request)
    {
        session([
            'checkout.address.name' => $request->get('name'),
            'checkout.address.detail' => $request->get('detail'),
            'checkout.address.city' => $request->get('city'),
            'checkout.address.phone' => $request->get('phone')
        ]);
    }

    public function payment()
    {
        return view('checkout.payment');
    }

    public function postPayment(Request $request)
    {
        $this->validate($request, [
            'bank_name' => 'required|in:' . implode(',',array_keys(config('bank-accounts'))),
            'sender' => 'required'
        ]);

        session([
            'checkout.payment.bank' => $request->get('bank_name'),
            'checkout.payment.sender' => $request->get('sender')
        ]);

        if (Sentinel::check()) return $this->authenticatedPayment($request);
        return $this->guestPayment($request);
    }

    protected function authenticatedPayment(Request $request)
    {
        $user = Sentinel::getUser();
        $bank = session('checkout.payment.bank');
        $sender = $sender = session('checkout.payment.sender');;
        $address = $this->setupAddress($user, session('checkout.address'));
        $order = $this->makeOrder($user->id, $bank, $sender, $address, $this->cart->details());

        // delete session data
        session()->forget('checkout');
        $this->cart->clearCartRecord();
        return redirect('/success')->with(compact('order'));
    }

    protected function guestPayment(Request $request)
    {
        // create user account
        $user = $this->setupCustomer(session('checkout.email'), session('checkout.address.name'));

        // create address
        $bank = session('checkout.payment.bank');
        $sender = session('checkout.payment.sender');
        $address = $this->setupAddress($user, session('checkout.address'));

        // create record
        $order = $this->makeOrder($user->id, $bank, $sender, $address, $this->cart->details());

        // delete session data
        session()->forget('checkout');
        $deleteCartCookie = $this->cart->clearCartCookie();
        return redirect('checkout/success')->with(compact('order'))
            ->withCookie($deleteCartCookie);
    }

    protected function setupCustomer($email, $name)
    {

        $user = Sentinel::registerAndActivate([
          'email'=>$request->input('email'),
          'password'=>$request->input('password'),
          'first_name'=>$request->input('name')
        ]);
        $customer = Sentinel::findRoleBySlug('customer');

        $customer->users()->attach($user);

        return $user;
    }

    protected function setupAddress($customer, $addressSession)
    {


        $customer = Sentinel::getUser()->id;

        $address = Address::where('user_id', $customer)->get()->first();

        return Address::create([
            'user_id' => $customer,
            'name' => $address->name,
            'detail' => $address->detail,
            'city' => $address->city,
            'phone' => $address->phone
        ]);
    }

    protected function makeOrder($user_id, $bank, $sender, Address $address, $cart)
    {
        $status = 'waiting-payment';
        $total_payment = 23400;
        $address_id = $address->id;
        $order = Order::create(compact('user_id', 'address_id', 'bank', 'sender', 'status', 'total_payment'));
        foreach ($cart as $product) {
            OrderDetail::create([
                'order_id' => $order->id,
                'address_id' => $address->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['detail']['price'],
                'total_price' =>($product['quantity'] * $product['detail']['price'])
            ]);
        }

        // return Order::find($order->id);
    }

    public function success()
    {
        return view('checkout.complete');
    }

}
