<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommissionRequest extends FormRequest
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
            'name' => 'required',
            'opening' => 'required',
            'closure' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da comissão é Obrigatório.',
            'opening.required' => 'A data de abertudara da comissão é obrigatória.',
            'closure.required' => 'A data de fechamento da comissão é obrigatória!',
        ];
    }
}
