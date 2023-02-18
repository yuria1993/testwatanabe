<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {

        return [
            'fullname' => 'required|max:255',
            'gender' => 'required|integer|in:1,2',
            'email' => 'required|email',
            'postcode' => 'required|max:8',
            'address' => 'required|max:255',
            'opinion' => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => '名前を入力してください',
            'email.required' => 'メールアドレスの形を入力してください',
            'postcode.required' => 'ハイフンを入れてください',
            'address.required' => '住所を入力してください',
            'opinion.required' => '入力してください',
            'opinion.max' => '120文字以内で入力してください',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'fullname' => $this->input('family-name') . ' ' . $this->input('given-name')
        ]);
    }
}
