<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class AddCateproRequest extends FormRequest
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
            //
            'name' =>'unique:a_cateproduct,capro_name'
        ];
    }
    public function messages()
    {
        return[
            'name.unique'=>'Tên danh mục sản phẩm đã bị trùng!'
        ];
    }
}
