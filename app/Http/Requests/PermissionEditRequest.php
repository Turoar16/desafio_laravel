<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionEditRequest extends FormRequest
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
        $permission = $this->route('permission');
        return [
            'name' => 'required|min:3|max:25|unique:permissions,name,' . $permission->id,//nombre es requerido ninimo de 3 a 25 caracteres,valor unico. En el caso de no cambios no generara error de validacion.
        ];
    }
}
