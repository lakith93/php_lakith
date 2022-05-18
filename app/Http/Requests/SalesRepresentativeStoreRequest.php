<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRepresentativeStoreRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|numeric|digits:10',
            'joined_date' => 'required|date',
            'route_id' => 'required',
            'comments' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Sales Representative name is required',
            'email.required' => 'Email Address is required'
        ];
    }
}
