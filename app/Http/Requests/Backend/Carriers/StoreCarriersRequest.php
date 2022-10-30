<?php

namespace App\Http\Requests\Backend\Carriers;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarriersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-carrier');
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
            'carrier_name' => ['required', 'max:191'],
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
            'partner_name.required' => 'Shipping Partner Name field is required.',
            'partner_name.max' => 'Shipping Partner Name may not be greater than 191 character.',
            'partner_email.required' => 'Shipping Partner Email field is required.',
            'carrier_name.required' => 'Carrier Name field is required.',
            'carrier_name.max' => 'Carrier Name may not be greater than 191 character.',
        ];
    }
}
