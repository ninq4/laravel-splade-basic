<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceStoreRequest extends FormRequest
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
            'title' => [
                'required',
                'min:6',
                'max:255',
                Rule::unique('services', 'title') ->ignore($this -> route('services'))
            ],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required',
                Rule::unique('services', 'image') ->ignore($this -> route('services'))
            ],
            'isActive' => ['required'],
        ];
    }
}
