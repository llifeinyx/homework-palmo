<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\SelectedItem;
use Illuminate\Http\Request;

class SelectedItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ban');
    }

    public function index($id)
    {

        $item = (Item::all()->where('id', '=', $id)->values())->first();
        $selectedItem = SelectedItem::all()->where('item_id', '=', $item->id)->where('user_id', '=', auth()->user()->getAuthIdentifier());

        if ($item->user_id === auth()->user()->getAuthIdentifier()){
            return back()->with('badUserIdSelectedItem', 1);
        }
        if ($item->user_id !== auth()->user()->getAuthIdentifier() && $selectedItem->isEmpty()){
            SelectedItem::create([
                'item_id' => $item->id,
                'user_id' => auth()->user()->getAuthIdentifier()
            ]);
            return back()->with('successSelectedItem', 1);
        } else {
            return back()->with('notSelectedItem', 1);
        }
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $userId = auth()->user()->getAuthIdentifier();

        $selectedItem = SelectedItem::all()->where('item_id', '=', $item->id)->where('user_id', '=', $userId);



        $selectedItem->first()->delete();

        return redirect()->route('profile');
    }
}
