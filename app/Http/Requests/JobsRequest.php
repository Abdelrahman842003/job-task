<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'location' => ['required', 'string'],
            'type' => 'required',
            'status' => 'required',
            'user_id' => ['required', 'exists:users,id'],
            'experience_requirements' => 'required',
            'vacancy' => 'required',
            'salary' => 'required',
            'deadline' => 'required',
        ];
    }
}
