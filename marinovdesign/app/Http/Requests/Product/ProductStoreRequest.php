<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'weight' => 'required|numeric|min:0',
            'dimension' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category' => 'required|numeric|min:0|exists:categories,id',
            'type' => 'required|numeric|min:0|exists:types,id',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'in_stock' => 'required|numeric|min:0'
        ];
    }
}
