<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteStoreRequest extends FormRequest
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
            'code' => 'required|unique:routes'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Route name is required',
            'code.required' => 'Route Code is required',
            'code.unique' => 'Route Code must be unique'
        ];
    }
}
