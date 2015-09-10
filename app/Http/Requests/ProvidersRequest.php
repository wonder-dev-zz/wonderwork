<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProvidersRequest extends Request
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
            'denomination' => 'required|alpha_num',
            'tva' => 'string',
            'family_id' => 'integer',
            'credit' => 'numeric',
            'encours' => 'numeric',
            'mode_id' => 'integer',
            'risque' => 'integer',
            'mode-tva' => 'integer',
            'remise' => 'string',
            'banque' => 'string',
            'badresse' => 'string',
            'bcp' => 'numeric',
            'bville' => 'string',
            'bpays' => 'alpha_num',
            'compte' => 'string',
            'iban' => 'string',
            'bic' => 'alpha',
            'remarque' => 'string'
        ];
    }
}
