@extends('layouts.main')
@section('content')
    <div class="container w-50">
        <div class="row">
            @if(\Illuminate\Support\Facades\Session::has('successSelectedItem'))
                <div class="w-75 m-4 alert alert-success" role="alert">
                   Success selected item
                </div>
            @elseif(\Illuminate\Support\Facades\Session::has('notSelectedItem'))
                <div class="w-75 m-4 alert alert-warning" role="alert">
                    This item already selected
                </div>
            @elseif(\Illuminate\Support\Facades\Session::has('badUserIdSelectedItem'))
                <div class="w-75 m-4 alert alert-warning" role="alert">
                    You cannot select your item
                </div>
            @endif
        </div>
        <div class="row">
            <div class="card">
                <img class="card-img-top" src="{{asset('storage/'.$item->avatar_path)}}" alt="Item avatar">
                <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <p class="card-text">{{$item->description}}</p>
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Name: {{$item->user->name}}</p>
                        </div>
                        <div class="col">
                            <p class="card-text">Phone number: {{$item->user->number}}</p>
                        </div>
                        <div class="col">
                            <p class="card-text">Cost: {{$item->cost}}</p>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    @if($userId !== $item->user_id)
                        <a class="btn btn-primary" href="{{route('selected_items.index', ['item' => $item->id])}}">Add to cart</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
