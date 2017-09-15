<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sentinel;

class CheckoutAddressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $new_address_rules = [
            'name' => 'required',
            'detail' => 'required',
            'city' => 'required|exists:id',
            'phone' => 'required|digits_between:9,15'
        ];

        if ($user = Sentinel::check()) {
          $address_limit = 1 . ',new-address';
          $rules = ['address_id' => 'required|in:' . $address_limit];
          if ($this->get('address_id') == 'new-address') {
            return $rules += $new_address_rules;
        }
            return $rules;
        }

        return $new_address_rules;
    }
}
