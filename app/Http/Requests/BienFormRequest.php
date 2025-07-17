<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BienFormRequest extends FormRequest
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
            'title' => ['required','min:4'],
            'Description'=> ['required','min:8'],
            'Surface' => ['required','min:2'],
            'price' => ['required','min:5'],
            'Sold' => ['required','boolean'],
            'quartier_id' => ['required', 'integer'],
            'type_bien_id' => ['required', 'integer'],
            'type_vente_id' => ['required', 'integer'],
            'images' => ['nullable', 'array'], // Accepter un tableau d’images
            'images.*' => ['image', 'max:4096'], // Chaque image doit être valide
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ];
    }
}
