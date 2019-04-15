<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SocietyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|string|max:191',
            'phone_number' => 'nullable|string|max:32',
            'address'      => 'nullable|string|max:191',
            'city'         => 'required|string|max:191',
            'postal_code'  => 'nullable|string|max:191',
            'website'      => 'nullable|string|max:191',

        ];
    }
}
