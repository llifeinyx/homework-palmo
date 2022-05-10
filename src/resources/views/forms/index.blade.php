@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert-info alert">
                    One user can have no more than 5 smart forms!
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">My smart forms:</li>
                    @foreach($forms as $form)
                        <li class="list-group-item form">
                            <div class="row">
                                <div class="col-6">
                                    <div id="carouselExampleControls{{$loop->index}}" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($form->images as $image)
                                            <div class="carousel-item @if($loop->first){{'active'}}@endif">
                                                <div class="form-slide">
                                                    <img src="{{asset('storage/' . $image->path)}}" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$loop->index}}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$loop->index}}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col">
                                            Name: {{$form->name}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-description">
                                            Description: {{$form->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="d-flex">
                                        <form method="post" action="{{route('forms.destroy', ['form' => $form->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                        <a href="{{route('forms.edit', ['form' => $form->id])}}" class="ms-4 btn btn-info">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    @if($forms->count() < 1)
                        <li class="list-group-item disabled">Clear</li>
                    @endif
                </ul>
            </div>
            <div class="col">
                <form action="{{route('forms.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Enter name of item</label>
                        <input type="text" class="form-control" id="inputName" name="inputName">
                    </div>
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="inputDescription" name="inputDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="inputFiles" class="form-label">Download a few photos</label>
                        <input class="form-control" type="file" id="inputFiles" name="inputFiles[]" multiple>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Send smart form">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
