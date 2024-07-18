<?php

namespace App\Http\Requests\V1\Property;

use Illuminate\Foundation\Http\FormRequest;

class PropertyIndexRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start' => 'numeric|min:0',
            'limit' => 'numeric|min:1',
            'search' => 'string',
            'price' => 'array',
            'price.from' => 'required_with:price|numeric|min:0',
            'price.to' => 'required_with:price|numeric|min:1',
            'cities' => 'array',
            'cities.*' => 'numeric|exists:cities,id',
            'types' => 'array',
            'types.*' => 'numeric|exists:property_types,id',
        ];
    }
}
