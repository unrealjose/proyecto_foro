<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|string|min:6'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener un minimo de 6 caracteres'
        ];
    }

}
