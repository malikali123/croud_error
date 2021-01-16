<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NationalityRequest extends FormRequest
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
            'national' => 'required|array|min:1',
            'national.*.name' => 'required',
            'national.*.abbr' => 'required',
            'visa_duration' => 'required',
            'visa_price' => 'required',
        ];
    }
}
