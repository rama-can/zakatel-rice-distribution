<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'nullable|unique:pages,slug,:id',
            'description' => 'required|string|max:255',
            'image' => 'sometimes|required_if:_method,POST|image|mimes:jpg,jpeg,png,gif,svg,avif,webp|max:2048',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
        ];
    }
}
