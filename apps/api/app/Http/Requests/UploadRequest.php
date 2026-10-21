<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

// Importação necessária da regra File

class UploadRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Usando 'file' (ou altere para 'attachment' caso prefira, mas alinhe com o Controller)
            'file' => [
                'required',
                File::default(), // Ou customize com File::types(['png', 'jpg'])->max(2 * 1024)
            ],
        ];
    }
}