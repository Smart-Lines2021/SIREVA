<?php

namespace App\Http\Requests\Empresa;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends FormRequest
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
           'no_proveedor' => 'required|numeric',
           'nombre' => 'required|string|max:40',
           'descripcion' => 'required|string|max:80',
           'persona_contacto' => 'required|string|max:40',
           'saldo' => 'required|numeric',
           'categoria_proveedor_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'no_proveedor.rquired'=>'Ingrese el número de proveedor',
            'no_proveedor.numeric'=>'Solo se admiten números en el campo número del proveedor',
            'nombre.required'=>'Asigne un nombre al proveedor',
            'nombre.max'=>'En el campo nombre solo se permiten ingresar 40 caracteres',
            'descripcion.required'=>'Ingrese la descripción del proveedor',
            'descripcion.max'=>'No puedes ingresar mas de 80 caracteres en el campo descripción',
            'persona_contacto.required'=>'Ingrese el nombre de la persona a contactar',
            'persona_contacto.max'=>'En el campo nombre de la persona a contactar, solo se permiten ingresar 40 caracteres',
            'saldo.rquired'=>'Ingrese la cantidad del saldo',
            'saldo.numeric'=>'Solo se admiten números en el campo saldo',
            'categoria_proveedor_id'=>'Seleccione una categoría del proveedor',
        ];
    }
}
