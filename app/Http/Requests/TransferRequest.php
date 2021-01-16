<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
            'id' => 'required',
            'branch_id' => 'required',
            'sender_name' => 'required',
            'recipient_name' => 'required',
            'bigInteger' => 'required|number',
            'amount' => 'required|int',
            'branch_id' => 'required',
            'branch_id' => 'required',
            'branch_id' => 'required',
            'plain_value' => 'nullable|numeric'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'يجبادخالالرقم',
            // 'id.exists:settings' => '',
            'value.required' => 'يجب ادخال قيمة التوصيل',
            //  'plain_value.required' => 'القيمة مطلوبة',
            'plain_value.numeric' => 'القيمة يجب ان يكون رقم',

        ];
    }
}
