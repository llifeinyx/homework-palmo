<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('main', ['categories' => $categories]);
    }
}
