<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class serviceRequest extends FormRequest
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
            'category' => 'required',
            'title' => 'required',
            'price' => 'required',
            'files' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>['need title'],
            'category.required'=>['need category'],
        ];

    }
}
