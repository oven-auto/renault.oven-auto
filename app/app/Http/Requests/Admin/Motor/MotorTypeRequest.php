<?php

namespace App\Http\Requests\Admin\Motor;

use Illuminate\Foundation\Http\FormRequest;

class MotorTypeRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'small_name' => 'required|string|max:255',
        ];
    }
}
