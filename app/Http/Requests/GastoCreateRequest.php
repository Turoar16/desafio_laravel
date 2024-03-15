<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GastoCreateRequest extends FormRequest
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
            'monto' => 'required|numeric|gt:0', // Monto debe ser un número y mayor a cero
            'concepto' => 'required|max:50', // Concepto debe contener solo letras y tener menos de 50 caracteres
            'fecha' => 'required|date', // Fecha debe ser una fecha válida
            'usuario_id' => 'required|numeric|in:' . auth()->id(), // El usuario_id debe ser igual al ID del usuario autenticado
        ];
    }
}
