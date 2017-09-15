<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutLoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

     public function rules()
     {
         return [
             'email'             => 'required|email',
             'checkout_password' => 'required_if:is_guest,0',
         ];
     }

     public function messages()
     {
         return [
             'email.required'                => 'Login Required',
             'checkout_password.required_if' => 'Password Required',
         ];
     }
}
