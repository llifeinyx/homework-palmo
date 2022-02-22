<?php

namespace App\Http\Requests;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
        $minCost = Item::all()->min('cost');
        $maxCost = Item::all()->max('cost');
        $maxMinCost = $this->request->get('rangeItemCostMax');
        $minMaxCost = $this->request->get('rangeItemCostMin');
        return [
            'inputNameItem' => 'max:100',
            'rangeItemCostMax' => 'integer|min:'.$minMaxCost.'|max:'.$maxCost,
            'rangeItemCostMin' => 'integer|min:'.$minCost.'|max:'.$maxMinCost
        ];
    }
}
