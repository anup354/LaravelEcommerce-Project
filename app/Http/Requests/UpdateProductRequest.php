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
            'product_name' => 'required|unique:products,product_name,' . $this->product->id,
            'description' => 'required',
            'brand' => 'required',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|numeric',
            'tax_percentage' => 'nullable|numeric',
            'product_order' => 'numeric',




        ];
    }
}
