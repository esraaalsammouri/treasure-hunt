<?php

namespace App\Domains\Country\Http\Requests\Backend\Country;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCountryRequest.
 */
class StoreCountryRequest extends FormRequest
{
    /**
     * Determine if the country is authorized to make this request.
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
            'code'=>'nullable',
            'icon_file'=>'nullable',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}