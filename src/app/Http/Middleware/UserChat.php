<?php

namespace App\Http\Middleware;

use App\Models\Chat;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $chat = Chat::find($request->chat);

        //if chat dont exist
        if (!$chat){
            return redirect()->route('chats.index');
        }

        //if chat is stranger
        $user = $chat->user;
        if (!$user->where('id', Auth::id())->first()){
            return redirect()->route('chats.index');
        }


        return $next($request);
    }
}
