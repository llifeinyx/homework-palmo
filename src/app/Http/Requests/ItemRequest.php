<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'inputNameItem' => 'required|string|min:3|max:20',
            'inputDescriptionItem' => 'required|string|min:50|max:400',
            'inputCostItem' => 'required|integer|min:0|max:9999999999',
            'inputCategoryItem' => 'required|exists:categories,id',
            'inputAvatarItem' => 'required|image|file|filled'
        ];
    }
}
