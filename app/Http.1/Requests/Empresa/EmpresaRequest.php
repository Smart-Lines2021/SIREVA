<?php

namespace App\Http\Requests\Empresa;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
           'razon_social' => 'required|string|max:130',
        ];
    }

    public function messages(){
        return [
            'razon_social.rquired'=>'La razón social de la empresa es obligatorio',
        ];
    }


}
