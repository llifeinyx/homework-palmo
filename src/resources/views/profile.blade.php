@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item active">My items</li>
                    <a href="{{route('items.create')}}" class="list-group-item list-group-item-action list-group-item-danger">
                        Create new item +
                    </a>
                    @foreach($userCreatedItems as $userItem)
                    <li class="list-group-item list-group-item-action">
                       <div class="row">
                           <p>{{$userItem->name}}</p>
                       </div>
                        <div class="row">
                            <div class="d-flex">
                                <a href="{{route('items.show', ['item' => $userItem->id])}}" class="m-1 btn btn-outline-success">Show</a>
                                <a href="{{route('items.edit', ['item' => $userItem->id])}}" class="m-1 btn btn-outline-warning">Edit</a>
                                <form class="m-1" action="{{ route('items.destroy', ['item' => $userItem->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item active">Chosen items</li>
                    @if(\PHPUnit\Framework\isEmpty($userSelectedItems))
                        <li class="list-group-item disable ">Clear</li>
                    @endif
                    @foreach($userSelectedItems as $userSelectedItem)
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <p>{{$userSelectedItem->name}}</p>
                            </div>
                            <div class="row">
                                <div class="d-flex">
                                    <a href="{{route('items.show', ['item' => $userSelectedItem->id])}}" class="m-1 btn btn-outline-success">Show</a>
                                    <a href="#" class="m-1 btn btn-outline-warning">Chat with vendor</a>
                                    <form class="m-1" action="{{route('selected_items.destroy', ['item' => $userSelectedItem->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
