<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\SelectedItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('ban');
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */

    public function index()
    {
        //return view('items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ItemRequest $request)
    {
        $data = $request->except('_token');
        $path = $request->file('inputAvatarItem')->storePublicly('avatars', 'public');

        Item::create([
         'name' => $data['inputNameItem'],
         'description' => $data['inputDescriptionItem'],
         'cost' => $data['inputCostItem'],
         'category_id' => $data['inputCategoryItem'],
         'user_id' => auth()->user()->getAuthIdentifier(),
         'avatar_path' => $path
         ]);

        return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function show($id): View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = [];
        $item = Item::find($id);
        $viewBool = true;

        if (Auth::check()){
            $tempUser = Auth::user();
            $usItems = $tempUser->item;
                if($usItems->where('id', '=', $id)->first() !== null){
                    $viewBool = false;
                }
            $user['role'] = $tempUser->role->name;
            $user['userId'] = $tempUser->id;
        }
        if($viewBool){
            $views = $item->views;
            $item->views = +$views + 1;
        }

        $item->save();

        return view('items.show', array_merge(['item' => $item], $user));


        //return view('items.show', ['role' => $user['role'], 'item' => $item, 'userId' => $user['id']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();

        return view('items.edit', ['item' => $item, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ItemRequest $request, $id)
    {
        $item = Item::find($id);

        if(Auth::user()->getAuthIdentifier() !== $item->user_id){
            return redirect()->route('profile');
        }

        $data = $request->except('_token', '_method');
        $path = $request->file('inputAvatarItem')->storePublicly('avatars', 'public');

        $item->update([
            'name' => $data['inputNameItem'],
            'description' => $data['inputDescriptionItem'],
            'cost' => $data['inputCostItem'],
            'category_id' => $data['inputCategoryItem'],
            'user_id' => auth()->user()->getAuthIdentifier(),
            'avatar_path' => $path
        ]);
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        $user = Auth::user();

        if($user->id !== $item->user_id && $user->role->name !== 'admin'){
            return redirect()->route('profile');
        }

        //Storage::delete($item->avatar_path);

        $selectedItems = SelectedItem::all()->where('item_id', '=', $id);

        foreach ($selectedItems as $selectedItem){
            $selectedItem->delete();
        }
        $item->delete();

        if ($user->role->name === 'admin'){
            return redirect()->route('search.index');
        }

        return redirect()->route('profile');
    }
}
