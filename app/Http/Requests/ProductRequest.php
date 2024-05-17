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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_name' => 'required|string',
            'product_name' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'engine' => 'required|integer',
            'driving' => 'required|integer',
            'comment' => 'nullable|string',
        ];
    }

    public function messages()
{
    return [
        'product_name.required' => '商品名は必須項目です。',
        'company_id.required' => '会社IDは必須項目です。',
        'company_id.exists' => '会社IDが存在しません。',
        'price.required' => '価格は必須項目です。',
        'stock.required' => '在庫数は必須項目です。',
        'engine.required' => '排気量は必須項目です。',
        'driving.required' => '走行距離は必須項目です。',
        'comment.max' => 'コメントは255文字以内で入力してください。',
    ];
}

}