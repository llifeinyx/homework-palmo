<?php
    $chat = \App\Models\Chat::find(42);
    $messages = $chat->message;

    $messagesArray = $messages->toArray();

    foreach ($messagesArray as &$message){
        $messageEloqument = $messages->find($message['id']);
        $message['username'] = $messageEloqument->user->name;
    }
    //dump($messagesArray);
?>
@extends('layouts.main')

@section('content')
    <div class="container" id="app">
        <div class="d-block m-auto">
            <h1>Test vue example</h1>
            <message-component v-bind:messages="{{json_encode($messagesArray)}}"></message-component>
        </div>
    </div>
@endsection
