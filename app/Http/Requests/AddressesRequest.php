<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddressesRequest extends Request
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
            'titre' => 'required|alpha_num',
            'societe' => 'required|string',
            'adresse' => 'required|string',
            'cp' => 'required|numeric',
            'ville' => 'required|string',
            'pays' => 'alpha_num',
            'forme' => 'integer',
            'tel' => 'string',
            'gsm' => 'string',
            'fax' => 'string',
            'mail' => 'email',
            'site' => 'active_url',
            'provider_id' => 'required|integer'
        ];
    }
}
