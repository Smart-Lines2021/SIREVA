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
        $rules = [
            'name' => 'required',
            'email' => ['required', Rule::unique('users')] //Obtenemos del parametro de la ruta la id del usuario
        ];
        if ($this->filled('password')) { //Nos sirve para saber si esta lleno
            $rules['password'] = ['confirmed', 'min:6'];
        }

        if ($this->method() === 'PUT') { //Si es para actualizar
            $rules = [
                'name' => 'required',
                'email' => ['required', Rule::unique('users')->ignore($this->route('usuario')->id)] //Obtenemos del parametro de la ruta la id del usuario
            ];
            if ($this->filled('password')) { //Nos sirve para saber si esta lleno
                $rules['password'] = ['confirmed', 'min:6'];
            }
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'email.unique' => 'El correo electronico ya esta en uso',
            'email.required' => 'Es necesario ingresar un correo electronico',
            'name.required' => 'Es necesario ingresar un nombre de usuario',
        ];
    }
}
