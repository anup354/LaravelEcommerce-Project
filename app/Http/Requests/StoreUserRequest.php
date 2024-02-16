<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:customer_registrations,email',
            'phonenumber' => 'required|numeric|unique:customer_registrations,phonenumber',
            'address' => 'required',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.'
            ],
            'confirm_password' => 'required|same:password',
        ];
    }


    // $credentials = $request->validate([
    //     'email' => ['required', 'email'],
    //     'password' => [
    //         'required',
    //         'string',
    //         'min:8',
    //         'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
    //     ],
    // ], [
    //     'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.'
    // ]);
}
