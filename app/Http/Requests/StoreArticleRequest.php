<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            
                'title' => 'required|max:255',
                'body' => 'required|max:1000',
                'premium' => 'nullable',
                'image'=> 'required|mimes:png,jpg,jpeg|max:2048|regex:/^[a-z0-9_.-]*$/',
        ];
    }
}
