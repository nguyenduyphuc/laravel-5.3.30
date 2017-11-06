<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|min:4',
            'description'=>'required|min:100',
            'summary'=>'required',
            'status'=>'required',
            'category'=>'required',
            'price'=>'required| min:3',
            'status'=>'required',
            'image'=>'required'
            // 'file'=>'max:100000000'

        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Vui lòng điền tên sản phẩm !',
            'name.min'=>'Tên sản phẩm ít nhất phải có 3 ký tự!',
            'description.required'=>'Vui lòng viết mô tả sản phẩm !',
            'description.min'=>'Mô tả sản phẩm phải ít nhất 100 ký tự !',
            'summary.required'=>'Vui lòng viết tóm tắt mô tả sản phẩm !',
            'status.required'=>'Chọn trạng thái sản phẩm !',
            'category.required'=>'Chọn danh mục sản phẩm',
            'price.required'=>'Vui lòng nhập giá của sản phẩm',
            'image.required'=>"Vui lòng chọn hình ảnh cho sản phẩm !"
            // 'file.max'=>'File max 100MB'
        ];
    }
}
