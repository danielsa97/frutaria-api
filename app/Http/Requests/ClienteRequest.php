<?php

namespace App\Http\Requests;

use App\Rules\CpfRule;
use App\Services\CustomFormRequest;

class ClienteRequest extends CustomFormRequest
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
            'cpf' => ['required', new CpfRule]
        ];
    }
}
