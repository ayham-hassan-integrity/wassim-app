<?php

namespace App\Domains\Test1\Http\Requests\Backend\Test1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreTest1Request.
 */
class StoreTest1Request extends FormRequest
{
    /**
     * Determine if the test1 is authorized to make this request.
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
            'name'=>'nullable',
            'mobile'=>'nullable',
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