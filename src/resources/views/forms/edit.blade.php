@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($form->images as $image)
                            <div class="carousel-item @if($loop->first){{'active'}}@endif">
                                <div class="form-slide">
                                    <img src="{{asset('storage/' . $image->path)}}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <input name="image[{{$image->id}}]" value="{{$image->id}}" form="editForm" type="checkbox" class="btn-check" id="btn-check-outlined{{$loop->index}}" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btn-check-outlined{{$loop->index}}">
                                            <span>
                                                check to delete
                                            </span>
                                        </label><br>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-6">
                <form action="{{route('forms.update', ['form' => $form->id])}}" method="post" enctype="multipart/form-data" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Enter name of item</label>
                        <input value="{{$form->name}}" type="text" class="form-control" id="inputName" name="inputName">
                    </div>
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="inputDescription" name="inputDescription" rows="3">{{$form->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="inputFiles" class="form-label">Download a few photos</label>
                        <input class="form-control" type="file" id="inputFiles" name="inputFiles[]" multiple>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Change smart form">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
