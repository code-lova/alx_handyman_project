<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostJobFormRequest extends FormRequest
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
            
            'job_title' => [
                'string',
                'required',
                'max:100',
                'unique:jobs,job_title'
            ],

            'job_location' => [
                'required',
                'string',
            ],

            'job_type' => [
                'required',
                'integer'
            ],

            'job_category' => [
                'required',
                'integer'
            ],

            'job_description' => [
                'required',
                'string',
                'max:1000'
            ],

            'url' => [
                'nullable',
                'string',
                'max:100',
                'url',
            ],

            'image' => [
                'nullable',
                'mimes:png,jpg,jpeg',
                'max:1024'
            ]

        ];
    }

    public function messages()
    {
        return [            
        'image.max' => "Maximum file size to upload is 1MB (1024 KB). If you are uploading a photo, try to reduce its resolution to make it under 8MB",
        'job_title.string' => "Please choose a job title",
        'job_location.required' => "Please pick a job location"
        ];
    }
}
