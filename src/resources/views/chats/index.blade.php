@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 m-3">
                <ul class="list-group">
                    <li class="list-group-item active">My chats:</li>
                    @foreach($chats as $chat)
                        <a href="{{route('chats.show', ['chat' => $chat->id])}}" class="btn btn btn-secondary"><li class="list-group-item">with {{$chat->user->where('id', '!=', \Illuminate\Support\Facades\Auth::id())->first()->name}}</li></a>
                    @endforeach
                </ul>
            </div>
            <div class="col m-3">
                <div class="row justify-content-center">
                    <li class="list-group-item active">Choise chat</li>
                </div>
            </div>
        </div>
    </div>
@endsection
