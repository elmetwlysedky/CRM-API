<?php

namespace App\Crm\Project\Requests;

use App\Crm\Base\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends ApiRequest
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
            'customer_id' => 'required',
            'status' => 'nullable',
            'cost' => 'nullable'
        ];
    }
}
