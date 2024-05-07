<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'message' => ['nullable', 'string'],
            'group_id' => ['required_without:receiver_id', 'integer', 'exists:groups,id'],
            'receiver_id' => ['required_without:group_id', 'integer', 'exists:users,id'],
            'attachments' => ['file', 'max:1024000']
        ];
    }
}
