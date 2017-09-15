<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutLoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
s
     public function rules()
     {
         return [
             'email'             => 'required|email',
             'is_guest'          => 'required|in:0,1',
             'checkout_password' => 'required_if:is_guest,0',
         ];
     }

     public function messages()
     {
         return [
             'email.required'                => 'Email required',
             'checkout_password.required_if' => 'Password Required',
         ];
     }
}
