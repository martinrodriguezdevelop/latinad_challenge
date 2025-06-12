<?php

namespace App\Http\Requests\Api;

use App\Enums\DisplayType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDisplayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $display = $this->route('display');
        return auth()->user()->can('update', $display);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:65535'],
            'price_per_day' => ['required', 'decimal:2'],
            'resolution_height' => ['required', 'numeric'],
            'resolution_width' => ['required', 'numeric'],
            'type' => ['required', new \Illuminate\Validation\Rules\Enum(DisplayType::class)],
        ];
    }
}
