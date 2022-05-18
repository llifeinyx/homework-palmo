<?php

namespace App\Http\Controllers;

use App\Events\MessageNotification;
use App\Http\Requests\MessageRequest;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ban');
        //$this->middleware('chat');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function check(Request $request)
    {
        $data = $request->except('_token', '_method');

        $vendor = User::find($data['vendorId']);
        $vendee = User::find(Auth::id());

        if (!$vendor){
            return redirect()->route('profile');
        }

        // NEW SOLUTION
        $chat_id = NULL;
        $chat = NULL;

        foreach ($vendee->chat as $chat1) {
            foreach ($vendor->chat as $chat2){
                //if exist
                if ($chat1->id === $chat2->id){
                    $chat_id = $chat1->id;
                    break;
                }
            }
        }

        if(!$chat_id){
            $chat = Chat::create(
                [
                    'vendor_id' => 1,
                    'vendee_id' => 1,
                ]);
            $chat->user()->attach(User::find([$data['vendorId'], Auth::id()]));
        } else{
            $chat = Chat::find($chat_id);
        }

        return redirect()->route('chats.show', ['chat' => $chat->id]);
    }

    public function index()
    {
        $user = User::find(Auth::id());

        return view('chats.index', ['chats' => $user->chat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::find(Auth::id());
        $chat = Chat::find($id);

        $messages = $chat->message;

        $messagesArray = $messages->toArray();

        foreach ($messagesArray as &$message){
            $messageEloqument = $messages->find($message['id']);
            $message['username'] = $messageEloqument->user->name;
            $message['observerId'] = Auth::id();
        }
        return view('chats.show', ['messages' => $messagesArray, 'user' => $chat->user->where('id', '!=', $user->id),'chats' => $user->chat, 'id' => $id, 'chat' => $chat]);
    }

    public function message(MessageRequest $request, $id)
    {
        $data = $request->except('_method', '_token');
        $user_id = Auth::id();

        $message = Message::create([
            'text' => $data['msg'],
            'user_id' => $user_id,
            'chat_id' => $id
        ]);

        //event for pusher
        $observer = $message->chat->user->where('id', '!=', $user_id);
        event(new MessageNotification($message, $observer->first()->id));

        return response()->json([$observer, $user_id]);
        //return redirect()->route('chats.show', ['chat' => $id]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $chat = Chat::find($id);
        $messages = $chat->message;
        $users = $chat->user;

        //delete all messages from chat
        foreach ($messages as $message){
            $message->delete();
        }

        //delete relations with users
        $chat->user()->detach($users);

        //delete chat
        $chat->delete();

        return redirect()->route('chats.index');
    }
}
