<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class IngresoFormRequest extends Request
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
            'idproveedor'=>'required',
            'tipo_comprobante'=>'required|max:70',
            'serie_comprobante'=>'max:20',
            'num_comprobante'=>'required|max:20',
            'cantidad'=>'required|numeric',
            'precio_compra'=>'required|numeric',
            'precio_venta'=>'required|numeric',
        ];
    }
}
