<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'number' => 'required',
            'year' => 'required',
            'date' => 'required',
            'author' => 'required',
            'type' => 'required',
            'summary' => 'required',
            'file' => 'required|mimetypes:application/pdf',
        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'O campo Número é Obrigatório.',
            'file.mimetypes' => 'O projeto deve estar no formato PDF.'
        ];
    }
}
