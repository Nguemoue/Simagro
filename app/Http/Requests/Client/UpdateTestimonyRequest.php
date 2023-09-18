<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "contenu"=>['required','string',"min:10"]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
