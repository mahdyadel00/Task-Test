<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "username" => "required|string",
            "email"  => "required|unique:users|email",
            "bio"  => "required|string",
            "type_id"  => "required",
            "title"  => "nullable|string",
            "file"  => 'nullable|mimes:jpeg,bmp,png,gif,svg,pdf',
            "location"  => "nullable|string",
            // "birthdate"  => "nulllable|date",
        ];
    }
}
