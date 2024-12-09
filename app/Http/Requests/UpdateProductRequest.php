<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'part_number' => 'sometimes|nullable|string|max:255',
            'oem' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string|max:2000',
            'price' => 'sometimes|nullable|numeric|min:0',
            'discount' => 'sometimes|nullable|numeric|min:0|max:100',
            'sub_category_id' => 'sometimes|nullable|exists:sub_categories,id',
            'category_id' => 'sometimes|nullable|exists:categories,id',
            'brand_id' => 'sometimes|nullable|exists:brands,id',
            'stock' => 'sometimes|nullable|integer|min:0',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'sometimes|nullable',
        ];
        
    }
}
