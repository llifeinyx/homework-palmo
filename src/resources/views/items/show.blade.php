@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card">
            <p>/storage/app/{{$item->avatar_path}}</p>
            <img class="card-img-top" src="/storage/{{$item->avatar_path}}" alt="Item avatar">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">{{$item->description}}</p>

            </div>
        </div>
    </div>
@endsection
