<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\SelectedItem;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ban');
    }

    public function index()
    {
        $userId = auth()->user()->getAuthIdentifier();
        $userCreatedItems = Item::all()->where('user_id', '=', $userId);
        $user = User::find($userId);
        return view('profile', ['userCreatedItems' => $userCreatedItems, 'userSelectedItems' => $user->selectedItem]);
    }
}
