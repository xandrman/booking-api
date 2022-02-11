<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'from' => 'required|date|date_format:Y-m-d H:00:00',
            'to' => 'required|date|date_format:Y-m-d H:00:00|after:from',
            'customer_id' => 'required|exists:customers,id',
        ];
    }
}
