<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\EmailVerificationJob;
use App\Models\EmailVerification;
use App\Providers\RouteServiceProvider;
use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'number' => ['required', 'string', 'max:10', 'min:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'password' => Hash::make($data['password']),
            'role_id' => '2',
            'ban_status' => 'no',
            'vip_status' => 0
        ]);

        $emailNotification = new EmailVerification();
        $emailNotification->hash = Hash::make($data['email']);
        $emailNotification->user_id = $user->id;
        $emailNotification->save();

        $url = url("/verification?" . 'id='.$emailNotification->id.'&hash='.$emailNotification->hash);

        EmailVerificationJob::dispatch($data['email'], $data['name'], $url);

        Cookie::queue(Cookie::make('PalmoEmailValidation', 'false'));

        return $user;
        //return null;
    }
}
