<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => 'required|string|max:255',          // تحقق من أن العنوان مطلوب ويجب أن يكون نصًا طوله لا يزيد عن 255 حرفًا
            'content' => 'required|string',                 // تحقق من أن المحتوى مطلوب ويجب أن يكون نصًا
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // تحقق من أن الصورة اختيارية، وإذا تم تقديمها، يجب أن تكون صورة بالامتدادات المحددة، وبحد أقصى 2048 كيلوبايت
            'status' => 'required|in:active,archived',              // تحقق من أن الحالة يجب أن تكون إما 'active' أو 'archived'
            'user_id' => 'required|exists:users,id',      // تحقق من أن المستخدم موجود في جدول المستخدمين
        ];
    }
}
