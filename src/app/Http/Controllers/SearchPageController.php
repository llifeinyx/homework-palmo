<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class SearchPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $items = Item::paginate(6);
        $categories = Category::all();
        $minCost = Item::all()->min('cost');
        $maxCost = Item::all()->max('cost');

        return view('search.index', ['items' => $items, 'categories' => $categories, 'minCost' => $minCost, 'maxCost' => $maxCost]);
    }
    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');
        dd($data);
    }

}
