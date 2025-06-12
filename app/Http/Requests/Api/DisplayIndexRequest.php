<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\FormApiRequest;
use App\Models\Display;
use Illuminate\Support\Facades\Gate;

class DisplayIndexRequest extends FormApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('viewAny', Display::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'type' => 'nullable|in:indoor,outdoor',
            'page' => 'nullable|integer|min:1',
            'perPage' => 'nullable|integer|min:1',
        ];
    }
}
