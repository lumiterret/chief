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
            'recipe.name' => ['required'],
            'recipe.instructions' => ['required'],
            'recipe.ingredients' => ['required', 'array'],
        ];
    }

    public function messages()
    {
        return [
            'recipe.name' => 'Поле "Название" не может быть пустым',
            'recipe.instructions' => 'Поле "Процесс приготовления" не может быть пустым',
            'recipe.ingredients' => 'Должен присутствовать хотя бы один ингредиент',
        ];
    }
}
