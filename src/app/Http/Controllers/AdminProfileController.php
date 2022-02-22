<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index(Request $request)
    {
        $users = User::query();

        return view('admin', ['users' => $users->paginate(10)]);
    }

    public function userBan(Request $request, $id){
        $banAction = $request->input('ban_action');

        $user = User::find($id);

        if ($banAction === 'ban'){
            $user->update([
               'ban_status' => 'yes'
            ]);
        }
        if ($banAction === 'deban'){
            $user->update([
               'ban_status' => 'no'
            ]);
        }

        return back();
    }

    public function userVip(Request $request, $id){

        $vipAction = $request->input('vip_action');

        $user = User::find($id);

        if ($vipAction === 'vip'){
            $user->update([
                'vip_status' => 1
            ]);
        }
        if ($vipAction === 'unvip'){
            $user->update([
                'vip_status' => 0
            ]);
        }

        return back();
    }


}
