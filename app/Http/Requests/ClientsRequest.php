<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientsRequest extends Request
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
            'societe' => 'string',
            'adresse' => 'string',
            'cp' => 'numeric',
            'ville' => 'string',
            'pays' => 'alpha_num',
            'forme' => 'integer',
            'tel' => 'string',
            'gsm' => 'string',
            'fax' => 'string',
            'mail' => 'email',
            'site' => 'active_url',
            'mode-tva' => 'integer',
            'remise_id' => 'integer',
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
