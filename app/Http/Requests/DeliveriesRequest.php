<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DeliveriesRequest extends Request
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
            'titre' => 'required|alpha_num|unique:deliveries,titre',
            'adresse' => 'required|string',
            'cp' => 'required|numeric',
            'ville' => 'required|string',
            'pays' => 'alpha_num',
            'tel' => 'string',
            'gsm' => 'string',
            'fax' => 'string',
            'client_id' => 'required|integer'
        ];
    }
}
