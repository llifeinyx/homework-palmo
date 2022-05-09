<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class SearchPageController extends Controller
{
    public function index()
    {
        $items = Item::query();
        $items->join('users', 'items.user_id', '=', 'users.id')->orderBy('users.vip_status', 'desc');

        $categories = Category::all();

        $minCost = Item::all()->min('cost');
        $maxCost = Item::all()->max('cost');

        return view('search.index', ['items' =>$items->select('items.*')->paginate(6), 'categories' => $categories, 'minCost' => $minCost, 'maxCost' => $maxCost]);
    }
    public function update(SearchRequest $request)
    {
        $data = $request->except('_token', '_method');
        $items = Item::query();
        $items->join('users', 'items.user_id', '=', 'users.id')->orderBy('users.vip_status', 'desc');
        $categories = Category::all();

        //if categories from main page
        if(count($data) === 1){
            foreach ($categories as $category){
                if(!isset($data['checkBoxCategoryId'.$category->id])){
                    $items->where('category_id', '!=', $category->id);
                }
            }
            goto show_items;
        }

        //name filter
        if ($data['inputNameItem'] !== NULL){
            $queryBladeName = '%'.$data['inputNameItem'].'%';
            $items->where('items.name', 'like', $queryBladeName);
        }

        //category filter
        if(array_search('true', $data) != 'inputNameItem' && in_array('true', $data)){
            foreach ($categories as $category){
                if(!isset($data['checkBoxCategoryId'.$category->id])){
                    $items->where('category_id', '!=', $category->id);
                }
            }
        }

        //cost filter
        //min
        $items->where('cost', '>=', $data['rangeItemCostMin']);
        //max
        $items->where('cost', '<=', $data['rangeItemCostMax']);

        show_items:

        $minCost = Item::all()->min('cost');
        $maxCost = Item::all()->max('cost');

        return view('search.index', ['inputs' => $data, 'items' => $items->select('items.*')->paginate(6), 'categories' => $categories, 'minCost' => $minCost, 'maxCost' => $maxCost]);
    }

}
