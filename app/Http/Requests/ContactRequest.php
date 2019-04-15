<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13/04/2019
 * Time: 16:20
 */
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'             => 'required|string|max:191',
            'last_name'        => 'required|string|max:191',
            'email'            => 'required|email|max:191',
            'phone_number'     => 'nullable|string|max:32',
            'fonction'         => 'nullable|string|max:191',
            'service'          => 'nullable|string|max:191',
            'civility'         => 'nullable|string|max:191',
            'date_of_birth'    => 'nullable|date',
            'society_id'       => 'required|numeric',
        ];
    }
}
