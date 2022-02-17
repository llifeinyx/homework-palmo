<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userCreatedItems = Item::all();
        return view('profile', ['userCreatedItems' => $userCreatedItems]);
    }
}
