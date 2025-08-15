<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:courses,name',
            'description' => 'required|string|max:1000',
            'professor_id' => 'nullable|exists:professors,id',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Course name is required.',
            'name.string' => 'Course name must be a string.',
            'name.max' => 'Course name cannot exceed 255 characters.',
            'name.unique' => 'This course name is already taken.',
            'description.required' => 'Course description is required.',
            'description.string' => 'Course description must be a string.',
            'description.max' => 'Course description cannot exceed 1000 characters.',
            'professor_id.exists' => 'The selected professor does not exist.',
        ];
    }
} 