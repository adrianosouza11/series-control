<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
          'name' => ['required','string', 'min:2'],
        ];
    }

    public function messages()
    {
        return [
          'name.*' => 'O campo nome é obrigatório e deve ter 2 letras.',
        ];
    }
}
