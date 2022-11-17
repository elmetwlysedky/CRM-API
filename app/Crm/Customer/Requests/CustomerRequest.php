<?php

namespace App\Crm\Customer\Requests;


use App\Crm\Base\Requests\ApiRequest;

class CustomerRequest extends ApiRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'notes' => 'nullable'
        ];
    }
}
