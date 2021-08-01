<?php

namespace App\Http\Requests;

use App\Models\Car;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_edit');
    }

    public function rules()
    {
        return [
            'brand' => [
                'string',
                'nullable',
            ],
            'model' => [
                'string',
                'nullable',
            ],
            'year' => [
                'string',
                'nullable',
            ],
            'vin_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
