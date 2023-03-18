<?php

namespace App\Http\Requests;

use App\Rules\DetailArrayValuesDistinct;
use Illuminate\Foundation\Http\FormRequest;

class StoreDetailRequest extends FormRequest
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
            'detail' => [
                'array',
                new DetailArrayValuesDistinct(),
            ],
            'detail.*.name' => 'required',
            'detail.*.A' => 'required|max:1',
            'detail.*.B' => 'required|max:1',
            'detail.*.C' => 'required|max:1',
            'detail.*.D' => 'required|max:1',
            'detail.*.E' => 'required|max:1',
        ];
    }
}
