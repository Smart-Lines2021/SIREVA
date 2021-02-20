<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:18',
            'empresa_id' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users', //Obtenemos del parametro de la ruta la id del usuario
           
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'El correo electronico ya esta en uso',
            'email.required' => 'Es necesario ingresar un correo electronico',
            'name.required' => 'Es necesario ingresar el nombre del usuario',
            'name.required' => 'Es necesario ingresar una contraseña para el usuario',
            'empresa_id.required' => 'No se encontro la empresa a la cual pertenece el usuario',
            
        ];
    }
}
