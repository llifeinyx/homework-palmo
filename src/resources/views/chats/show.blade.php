@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 m-3">
                <ul class="list-group">
                    <li class="list-group-item active">My chats:</li>
                    @foreach($chats as $achat)
                        <a href="{{route('chats.show', ['chat' => $achat->id])}}" class="btn @if($achat->id == $id){{'btn-primary'}}@else{{'btn-secondary'}}@endif"><li class="list-group-item">with {{$achat->user->where('id', '!=', \Illuminate\Support\Facades\Auth::id())->first()->name}}</li></a>
                    @endforeach
                </ul>
            </div>
            <div class="col m-3" style="background: #cdedfa;">
                <div class="row">
                    <li class="list-group-item active">Chat with {{$chat->user->where('id', '!=', \Illuminate\Support\Facades\Auth::id())->first()->name}}</li>
                </div>
                <div class="row mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-warning" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        Do not share your password with anyone!
                    </div>
                </div>
                <div tabindex="0" class="" style="display:flex;flex-direction: column-reverse;height: 30rem; position: relative; overflow: auto;">
{{--                    <ul class="list-group" style="flex-direction: column-reverse;">--}}
                    @foreach($chat->message->reverse() as $message)
                        <div class="d-flex @if($message->user->id == \Illuminate\Support\Facades\Auth::id()){{'flex-row'}}@else{{'flex-row-reverse'}}@endif">
                            <li class="list-group-item p-2 m-2" style="max-width: 60%;word-wrap: anywhere;border-radius: 10px; background: #fff"><p style="font-size: 13px;color: #4a5568">{{$message->user->name}}</p> {{$message->text}}</li>
                        </div>
                    @endforeach
{{--                    </ul>--}}
                </div>
                <div class="row">
                    <form enctype="multipart/form-data" name="msgForm" id="msgForm" method="post" action="{{route('chats.message', ['chat' => $chat->id])}}" class="input-group mb-3">
                        @csrf
                        @method('PUT')
                        <input name="msg" id="msg" type="text" class="form-control" placeholder="Enter message" aria-describedby="button-addon2">
                        <input type="submit" class="btn btn-outline-secondary" value="Send message">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
