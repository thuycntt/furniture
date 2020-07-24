<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCateproRequest extends FormRequest
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
            'name' =>'unique:a_cateproduct,capro_name,'.$this->segment(4).',capro_id'
        ];
    }
    public function messages()
    {
        return [
            //
            'name' =>'Tên thể loại danh mục đã bị trùng!'
        ];
    }
}
