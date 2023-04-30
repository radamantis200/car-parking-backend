<?php

namespace App\Http\Requests\Parking;

use Illuminate\Foundation\Http\FormRequest;

class StoreParkingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'vehicle_id' => [
                'required',
                'uuid',
                'exists:vehicles,id,deleted_at,NULL,user_id,'.auth()->id(),
            ],
            'zone_id' => ['required', 'uuid', 'exists:zones,id'],
        ];
    }
}
