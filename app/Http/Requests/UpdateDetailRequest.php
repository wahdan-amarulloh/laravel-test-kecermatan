<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'detail' => 'array',
            'detail.*.answer' => 'required|max:1',
            'detail.*.A' => 'sometimes|max:1',
            'detail.*.B' => 'sometimes|max:1',
            'detail.*.C' => 'sometimes|max:1',
            'detail.*.D' => 'sometimes|max:1',
            'detail.*.E' => 'sometimes|max:1',
        ];
    }
}
