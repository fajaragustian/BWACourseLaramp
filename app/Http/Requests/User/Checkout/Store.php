<?php

namespace App\Http\Requests\User\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //VARIBALE DATE date
        $expiredValidation = date('M-Y', time());
        return [
            'name' => 'required|string',
            // jika email sama dengan menggunakan user sama maka data akan terinput seperti biasa
            // namun jika user berbeda dengan user yang beda dan email sama tidak bisa
            'email' => 'required|email|unique:users,email,' . Auth::id() . ',id',
            'working' => 'required|string',
            'card_number' => 'required|numeric|digits_between:8,16',
            'expired' => 'required|date|date_format:Y-m|after_or_equal:' . $expiredValidation,
            'cvc' => 'required|numeric|digits:3',

        ];
    }
}
