@extends('layouts.main')

@section('extra-header')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sliderRangeItemCost" ).slider({
                range: true,
                min: {{$minCost}},
                max: {{$maxCost}},
                values: [ 75, 300 ],
                slide: function( event, ui ) {
                    $( "#rangeItemCost" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                    $( "#rangeItemCostMin" ).val(ui.values[ 0 ]);
                    $( "#rangeItemCostMax" ).val(ui.values[ 1 ]);
                }
            });
            // $( "#rangeItemCost1" ).val( "$" + $( "#sliderRangeItemCost" ).slider( "values", 0 ) +
            //     " - $" + $( "#sliderRangeItemCost" ).slider( "values", 1 ) );
            // $( "#rangeItemCost" ).val( "$" + $( "#sliderRangeItemCost" ).slider( "values", 0 ) +
            //     " - $" + $( "#sliderRangeItemCost" ).slider( "values", 1 ) );
        } );
    </script>
@endsection

@section('content')
    <div class="container p-4 border">
        <div class="row">
            <h1>List of items</h1>
        </div>
        <div class="row" style="height: 35rem">
            <div class="col-4">
                <form method="POST" action="{{route('search.update')}}">
                    @csrf
                    <legend>Filters:</legend>
                    <div class="mb-3 d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="inputNameItem">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                    <div class="mb-3">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle"role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                Choose categories:
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($categories as $category)
                                <li class="p-2 border-bottom">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" id="flexCheckChecked" name="{{'checkBoxCategoryId'.$category->id}}">
                                        <label class="form-check-label">
                                            {{$category->name}}
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="rangeItemCost">Price range:</label>
                        <input type="text" class="form-text" id="rangeItemCost" readonly>
                        <div class="m-2" id="sliderRangeItemCost"></div>
                        <input name="rangeItemCostMin" value="{{$minCost}}" type="text" id="rangeItemCostMin" hidden>
                        <input name="rangeItemCostMax" value="{{$maxCost}}" type="text" id="rangeItemCostMax" hidden>
                    </div>
                </form>
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
