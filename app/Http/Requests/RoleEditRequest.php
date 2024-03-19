<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleEditRequest extends FormRequest
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
        $role = $this->route('role');
        return [
            'name' => 'required|min:3|max:25|unique:roles,name,' . $role->id,//nombre es requerido ninimo de 3 a 25 caracteres,valor unico. En el caso de no cambios no generara error de validacion.
        ];
    }
}
