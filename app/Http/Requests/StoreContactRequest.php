<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name'        => 'required|string|max:255',
            'email'       => 'required|email:filter|max:255|unique:contacts,email,' . auth()->id() . ',user_id',
            'phone'       => 'required|string|max:20|unique:contacts,phone,' . auth()->id() . ',user_id',
            'address'     => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'is_favorite' => 'boolean',
        ];
    }
}
