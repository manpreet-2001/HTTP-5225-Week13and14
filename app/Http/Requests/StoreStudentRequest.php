<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email|max:255',
            'course_ids' => 'nullable|array',
            'course_ids.*' => 'exists:courses,id',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'fname.required' => 'First name is required.',
            'fname.string' => 'First name must be a string.',
            'fname.max' => 'First name cannot exceed 255 characters.',
            'lname.required' => 'Last name is required.',
            'lname.string' => 'Last name must be a string.',
            'lname.max' => 'Last name cannot exceed 255 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'email.max' => 'Email cannot exceed 255 characters.',
            'course_ids.array' => 'Course selection must be an array.',
            'course_ids.*.exists' => 'One or more selected courses do not exist.',
        ];
    }
}
