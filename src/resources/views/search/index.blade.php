@extends('layouts.main')

@section('content')
    <div class="container p-4 border">
        <div class="row">
            <h1>List of items</h1>
        </div>
        <div class="row">
            <div class="col-4">
                los puetro
            </div>
            <div class="col">
                <div class="row">
                    @foreach($items as $item)
                        <div class="card m-2" style="width: 14rem">
                            <img class="card-img-top" src="{{asset('storage/'.$item->avatar_path)}}" alt="Item avatar">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->name}}</h5>
                                <p class="card-text">Cost: {{$item->cost}}</p>
                                <a href="{{route('items.show', ['item' => $item->id])}}" class="btn btn-primary">Show</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    {{$items->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
