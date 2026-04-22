<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ];
    }
}
