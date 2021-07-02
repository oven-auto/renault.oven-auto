<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Route;

class BrandCreateRequest extends FormRequest
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
        //Получаю параметр из роута
        $brand = Route::current()->parameter('brand');
        
        return [
            'name'=>[
                'required',
                'string',
                'max:255',
                Rule::unique('brands')->ignore($brand ? $brand->id : ''),
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Поле название обязательно для заполнения',
            'name.string'=>'Поле название должно быть строкой',
            'name.max'=>'Поле название не более 255 символов',
            'name.unique'=>'Поле название должно быть уникальным',
        ];
    }
}
