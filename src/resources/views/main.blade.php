@extends('layouts.main')

@section('content')
    <div class="container w-50">
        <div class="alert alert-secondary p-4" role="alert">
            <h4 class="alert-heading">About us</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis expedita ipsum iste nihil odio quam quibusdam, sed soluta tempore velit veritatis, voluptates? Aut est magnam molestiae natus quibusdam similique ullam? </p>
            <hr>
            <p class="mb-0">Go to search <a href="{{route('search.index')}}">items</a> </p>
        </div>
        <div class="card p-4 m-4">
            <div class="card-body">
                <h5 class="card-title">Main categories</h5>
                <ul class="list-group">
                    @foreach($categories as $category)
                        <a class="list-group-item" href="#">{{$category->name}}</a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
