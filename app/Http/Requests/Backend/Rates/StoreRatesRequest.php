<?php

namespace App\Http\Requests\Backend\Rates;

use Illuminate\Foundation\Http\FormRequest;

class StoreRatesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-rate');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'import_csv' => 'required|mimes:csv'
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
            'import_csv.required' => 'The CSV File is required.',
            'import_csv.mimes:csv' => 'The File must be a CSV file.'
        ];
    }
}
