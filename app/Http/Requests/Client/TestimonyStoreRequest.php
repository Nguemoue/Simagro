<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class TestimonyStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contenu'=>['required','string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
