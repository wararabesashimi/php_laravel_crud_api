<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => [
                'missing',
            ],

            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'price' => [
                'sometimes',
                'required',
                'integer:strict',
                'between:0,4294967295',
            ],

            'description' => [
                'sometimes',
                'nullable',
                'string',
                'max:2000',
            ],
        ];
    }
}