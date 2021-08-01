<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_edit');
    }

    public function rules()
    {
        return [
            'order_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'generic_article' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'article_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'brand_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
