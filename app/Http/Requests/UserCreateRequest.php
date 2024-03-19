<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:25',//nombre es requerido minimo de 3 a 25 caracteres.
            'name' => 'required|unique:users',//nombre de usuario es requerido es de valor unico
            'email' => 'required|email|unique:users',//email es requerido y de valor unico.
            'password' => 'required'//la contraseña es requerido.
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El usuario es obligatorio.',
            'name.unique' => 'El usuario ya está en uso.'
        ];
    }
}
