<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->contact->user_id === Auth::id();
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
            'email'       => [
                'required',
                'email:filter',
                'max:255',
                Rule::unique('contacts')
                    ->where(fn($query) => $query->where('user_id', auth()->id()))
                    ->ignore($this->contact?->id),
            ],
            'phone'       => [
                'required',
                'string',
                'max:20',
                Rule::unique('contacts')
                    ->where(fn($query) => $query->where('user_id', auth()->id()))
                    ->ignore($this->contact?->id),
            ],
            'address'     => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'is_favorite' => 'boolean',
        ];
    }
}
