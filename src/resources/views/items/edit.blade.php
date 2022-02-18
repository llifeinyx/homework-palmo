@extends('layouts.main')

@section('content')
    <div class="container w-50">
        <form method="POST" enctype="multipart/form-data" name="editItemForm" id="editItemForm" action="{{ route('items.update', ['item' => $item->id]) }}">
            @csrf
            @method('PUT')
            <fieldset>
                <legend>Edit item</legend>
                <div class="form-group">
                    <label for="inputNameItem">Name item</label>
                    <input value="{{$item->name}}" required type="text" class="form-control @error('inputNameItem') is-invalid @enderror" name="inputNameItem" id="inputNameItem" placeholder="Enter name item">
                    <div class="invalid-feedback">@error('inputNameItem'){{$message}}@enderror</div>
                </div>
                <div class="form-group">
                    <label for="inputDescriptionItem">Description</label>
                    <textarea required maxlength="400" minlength="50" placeholder="Minimum 50 characters" class="form-control @error('inputDescriptionItem') is-invalid @enderror" id="inputDescriptionItem" name="inputDescriptionItem" rows="3">{{$item->description}}</textarea>
                    <div class="invalid-feedback">@error('inputDescriptionItem'){{$message}}@enderror</div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="inputCostItem">Cost</label>
                        <input value="{{$item->cost}}" type="number" min="0" max="9999999999" class="form-control @error('inputCostItem') is-invalid @enderror" id="inputCostItem" name="inputCostItem">
                        <div class="invalid-feedback">@error('inputCostItem'){{$message}}@enderror</div>
                    </div>
                    <div class="form-group col">
                        <label for="inputCategoryItem">Category</label>
                        <select id="inputCategoryItem" name="inputCategoryItem" class="form-control @error('inputCategoryItem') is-invalid @enderror">
                            @foreach($categories as $category)
                                <option @if($item->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('inputCategoryItem'){{$message}}@enderror</div>
                    </div>
                    <div class="form-group col-6">
                        <label for="inputAvatarItem">Upload photo</label>
                        <input type="file" accept="image/*" class="form-control @error('inputAvatarItem') is-invalid @enderror" id="inputAvatarItem" name="inputAvatarItem">
                        <div class="invalid-feedback">@error('inputAvatarItem'){{$message}}@enderror</div>
                    </div>
                </div>
                <br>
                <input type="submit" name="inputCreateItem" class="btn btn-primary" value="Edit item">
            </fieldset>
        </form>
    </div>
@endsection
