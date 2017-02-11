<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class EditClienteRequest extends Request
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
           'nombre'=>'required|max:70',
            'tipo_documento'=>'required|max:70',
            'num_documento'=>'required|numeric',
            'direccion'=>'required|max:200',
            'telefono'=>'required|numeric',
            'email'=>'required|email',
        ];
    }
}
