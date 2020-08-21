<?php

namespace App\Http\Requests;

use App\Rules\CpfRule;
use App\Services\CustomFormRequest;

class VendaRequest extends CustomFormRequest
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
            'cliente_id' => 'required|numeric',
            'fruta_id' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'fruta_id' => 'fruta',
            'cliente_id' => 'cliente'
        ];
    }
}
