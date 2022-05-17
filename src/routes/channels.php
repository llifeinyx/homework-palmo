<?php

use App\Models\Chat;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//Broadcast::channel('notification.{chat_id}', function ($user, $chat_id) {
//    if ($user->chat->where('chat_id', '=', $chat_id)){
//        return true;
//    }
//    return true;
//});
Broadcast::channel('notification.{id}', function ($user, $id) {
    if ($user->chat->find($id) !== null){
        return true;
    }
});
