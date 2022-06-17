<?php

namespace App\Http\Controllers;

use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmailVerificationController extends Controller
{
    public function verification(Request $request)
    {

        $id = $request->id;
        $hash = $request->hash;

        $emailVerification = EmailVerification::query()->find($id);

        if ($emailVerification === null){
            abort(404);
        }
        if ($emailVerification->hash !== $hash){
            abort(404);
        }

        $emailVerification->delete();

        return view('auth.login', ['successAuth' => true]);
    }
}
