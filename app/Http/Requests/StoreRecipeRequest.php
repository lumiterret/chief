<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
            'name' => ['required'],
            'instructions' => 'required',
            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|max:255',
            'ingredients.*.notes' => 'nullable|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Поле "Название" не может быть пустым',
            'instructions' => 'Поле "Процесс приготовления" не может быть пустым',
            'ingredients' => 'Должен присутствовать хотя бы один ингредиент',
        ];
    }
}
