<?php

namespace App\Http\Requests;

use App\Rules\CpfRule;
use App\Services\CustomFormRequest;

class FrutaRequest extends CustomFormRequest
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
            'nome' => 'required',
            'data_validade' => 'required|date|date_format:Y-m-d',
            'quantidade' => 'required|numeric',
            'valor_unitario' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'data_validade' => 'data de validade',
            'valor_unitario' => 'valor unitario'
        ];
    }
}
