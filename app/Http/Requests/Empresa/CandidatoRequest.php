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

       
        $rules = [
            'curp' => 'required|max:18|unique:candidatos',
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'string|max:100',
            'estado' => 'required',
            'municipio' => 'required',
            'codigo_postal' => 'required',
            'colonia' => 'required',
            'calle' => 'required',
            'correo' => 'required',
            'numero_exterior' => 'required',
            'telefono_celular' => 'required',
            'empresa_id' => 'required',
            'afiliacion_id' => 'required',
            'tipo_candidato_id' => 'required',
            'sexo_id' => 'required',
            'user_id' => 'required',
        ];
        if ($this->method() === 'PUT') { //Si es para actualizar
            $rules = [
                'curp' => ['required','max:18', Rule::unique('users')->ignore($this->user->id)],
                'nombre' => 'required|string|max:100',
                'apellido_paterno' => 'required|string|max:100',
                'apellido_materno' => 'string|max:100',
                'estado' => 'required',
                'municipio' => 'required',
                'codigo_postal' => 'required',
                'colonia' => 'required',
                'calle' => 'required',
                'correo' => 'required',
                'numero_exterior' => 'required',
                'telefono_celular' => 'required',
                'empresa_id' => 'required',
                'afiliacion_id' => 'required',
                'tipo_candidato_id' => 'required',
                'sexo_id' => 'required',
                'user_id' => 'required',
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Asigne un nombre al candidato',
            'nombre.max' => 'En el campo nombre solo se permiten ingresar 100 caracteres',
            'apellido_paterno.max' => 'En el campo apellido paterno solo se permiten ingresar 100 caracteres',
            'curp.required' => 'La CURP es un campo requerido',
            'curp.max' => 'Solo se permiten 18 caracteres en la CURP',
            'curp.unique' => 'La curp que intentass registrar ya se encuentra en el sistema',
            'apellido_paterno.required' => 'El campo apellido paterno es requerido',
            'apellido_paterno.string' => 'El campo apellido paterno debe contener solo letras',
            'apellido_materno.max' => 'En el campo apellido paterno solo se permiten ingresar 100 caracteres',
            'apellido_materno.string' => 'El campo apellido paterno debe contener solo letras',
            'curp.unique' => 'La CURP que intentas registrar ya ha sido ingresada',
            'estado.required' => 'El campo estado es requerido',
            'municipio.required' => 'El campo municipio es requerido',
            'codigo_postal.required' => 'El campo codigo postal es requerido',
            'colonia.required' => 'El campo colonia es requerido',
            'calle.required' => 'El campo calle es requerido',
            'numero_exterior.required' => 'El número exterior es un campo requerido',
            'telefono_celular.required' => 'El telefono celular es un campo requerido',
            'correo.required' => 'El correo es un campo requerido',
            'empresa_id.required' => 'La empresa es un campo requerido',
            'afiliacion_id.required' => 'Afiliacion es un campo requerido',
            'tipo_candidato_id.required' => 'Tipo de candidato es un campo requerido',
            'sexo_id.required' => 'Sexo es un campo requerido',
            'user_id.required' => 'Sexo es un campo requerido',

        ];
    }
}
