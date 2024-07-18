<?php

namespace App\Http\Requests\V1\Property;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PropertyCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(auth()->user()) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitude' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'bedrooms' => 'required|numeric|max:100',
            'bathrooms' => 'required|numeric|max:100',
            'square_feet' => 'required|numeric',
            'type_id' => 'numeric|exists:property_types,id',
            'city_id' => 'numeric|exists:cities,id',
            'state_id' => 'numeric|exists:states,id',
            'country_id' => 'numeric|exists:countries,id',
            'user_id' => 'numeric|exists:users,id'
        ];
    }
}
