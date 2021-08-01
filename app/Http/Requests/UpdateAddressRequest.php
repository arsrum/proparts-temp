<?php

namespace App\Http\Requests;

use App\Models\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_edit');
    }

    public function rules()
    {
        return [
            'country' => [
                'string',
                'nullable',
            ],
            'state' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'street_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
