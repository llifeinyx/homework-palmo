<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormsRequest extends FormRequest
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
        $rule = 'required|array';
        if ($this->request->get('_method') === 'PUT'){
            $rule = 'array';
        }
        //dd('auf');
        return [
            'inputName' => 'required|string|max:50',
            'inputDescription' => 'required|string|max:300',
            'inputFiles' => $rule,
            'inputFiles.*' => 'required|image|file|max:500',
            'image' => 'array',
            'image.*' => 'integer|min:0',
        ];
    }
}
