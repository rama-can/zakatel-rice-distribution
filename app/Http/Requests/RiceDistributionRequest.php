<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RiceDistributionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'quantity_distributed' => filter_var($this->quantity_distributed, FILTER_SANITIZE_NUMBER_INT),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'slug' => 'nullable|unique:pages,slug,:id',
            'description' => 'required|max:255',
            'content' => 'required',
            'author' => 'required',
            'start_address' => 'nullable',
            'final_address' => 'nullable',
            'destination' => 'nullable',
            'distribution_date' => 'required|date',
            'quantity_distributed' => 'required|integer',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,avif,webp|max:2048',
        ];
        // 'sku' => [
        //     'required',
        //     'max:100',
        //     Rule::unique('products')->ignore($this->id),
        // ],

        // if ($this->getMethod() == 'POST') {
        //     // Rules for store
        //     $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg,avif,webp|max:2048';
        // } elseif ($this->getMethod() == 'PUT' || $this->getMethod() == 'PATCH') {
        //     // Rules for update
        //     $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg,avif,webp|max:2048';
        // }

        // return $rules;
    }
}