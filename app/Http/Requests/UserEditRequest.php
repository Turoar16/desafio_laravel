<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $user = $this->route('user');
        return [
            'nombre' => 'required',//nombre es requerido.
            'name' => ['required', 'min:3','max:25', 'unique:users,name,' . $user->id],//nombre de usuario es requerido minimo de 3 a 25 caracteres, valor unico en caso de no cambio no afecta a la validacion.
            'email' => [
                'required', 'unique:users,email,' . request()->route('user')->id//email es requerido y unico para el usuario asignado.
            ],
            'password' => 'sometimes'//es requerido segun cambio no es obligatorio.
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
