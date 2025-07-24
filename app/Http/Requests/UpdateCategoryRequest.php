<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'name'        => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')
                    ->where(fn($query) => $query->where('user_id', $this->user()->id))
                    ->ignore($this->category->id),
            ],
            'description' => 'nullable|string|max:1000',
        ];
    }
}
