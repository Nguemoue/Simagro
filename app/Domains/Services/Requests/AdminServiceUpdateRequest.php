<?php

namespace App\Domains\Services\Requests;

use App\Domains\Services\Data\ServiceData;
use Illuminate\Foundation\Http\FormRequest;

class AdminServiceUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'titre'=>['required'],
            'but'=>['required'],
            'description'=>['required'],
            'image'=>['nullable','image'],
            'other_images'=>['nullable','array']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function toDto(): ServiceData
    {
        return new ServiceData(
            $this->input('titre'),
            $this->input('but'),
            $this->input('description'),
            $this->file('image'),
            $this->file('other_images')
        );
    }
}
