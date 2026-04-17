<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditionRequest extends FormRequest
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
            'isbn' => 'required|size:13',
            'title' => 'required|max:50|min:3',
            'language' => 'required|max:50|min:3',
            'publication_date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'format' => 'required|max:100|min:3',
            'synopsis' => 'required|max:50|min:3',
            'editorial_id' => 'required|integer|exists:editorials,id',
            'book_id' => 'required|integer|exists:books,id',
        ];
    }
}
