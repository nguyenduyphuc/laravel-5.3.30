<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email'=>'required|min:7|email',
            'name'=>'required|min:4',
            'phone'=>'required|digits_between:10,11|numeric',
            'address'=>'required|min:5',
            'state'=>'required',
            'district'=>'required'

        ];
    }

    public function messages()
    {
        return[
            'email.required'=>'Vui lòng điền tên của bạn !',
            'email.min'=>'Địa chỉ Email phải có ít nhất 7 ký tự !',
            'email.email'=>'Vui lòng nhập đúng định dạng Email!',
            'name.required'=>'Vui lòng điền tên của bạn !',
            'name.min'=>'Tên của bạn ít nhất phải có 3 ký tự!',
            'address.required'=>'Vui lòng nhập địa chỉ giao hàng !',
            'address.min'=>'Địa chỉ giao hàng phải ít nhất 5 ký tự !',
            'phone.required'=>'Vui lòng nhập số điện thoại của bạn !',
            'phone.digits_between'=>'Số điện thoại của bạn phải có ít nhất 10 ký tự và tối đa 11 ký tự là số !',
            'phone.numeric'=>'Số điện thoại của bạn phải phải là ký tự số !',
            'state.required'=>'Vui Chọn tỉnh thành bạn sống',
            'district.required'=>'Vui lòng chọn quận, huyện bạn sống',
        ];
    }
}
