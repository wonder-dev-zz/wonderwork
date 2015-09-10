<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersRequest extends Request
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
            'login' => 'required|min:5',
            'nom' => 'min:5',
            'prenom' => 'min:5',
            'adresse' => 'min:5',
            'code' => 'numeric|integer',
            'local' => 'min:5',
            'mail' => 'email',
            'auth' => 'check',
        ];
    }
}
