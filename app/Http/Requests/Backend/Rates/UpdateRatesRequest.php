<?php

namespace App\Http\Requests\Backend\Rates;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRatesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-rate');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'partner_name' => ['required', 'max:191'],
            'partner_email' => ['required', 'email'],
            'rate_name' => ['required', 'max:191'],
        ];
    }

    /**
     * Show the Messages for rules above.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'partner_name.required' => 'Shipping Partners Name field is required.',
            'partner_name.max' => 'Shipping Partner Name may not be greater than 191 character.',
            'partner_email.required' => 'Shipping Partner Email field is required.',
            'rate_name.required' => 'Rate Name field is required.',
        ];
    }
}
