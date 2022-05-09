@extends('layouts.main')

@section('content')
    <div>
        <div class="carousel-container">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-slide">
                            <img src="{{asset("images/categories/mainslide.jpg")}}" class="d-block w-100" alt="all categories">
                            <div class="carousel-caption d-none d-md-block">
                                <form method="get" action="{{route('search.index')}}">
                                    <input class="btn" type="submit" value="All categories">
                                </form>
                            </div>
                        </div>
                    </div>
                    @foreach($categories as $category)
                    <div class="carousel-item">
                        <div class="carousel-slide">
                            <img src="{{asset("images/categories/". $category->id.".jpg")}}" class="d-block w-100" alt="{{$category->name}}">
                            <div class="carousel-caption d-none d-md-block">
                                <form method="POST" action="{{route('search.update')}}">
                                    @csrf
                                    <input type="checkbox" checked hidden value="true" name="{{'checkBoxCategoryId'.$category->id}}" id="checkBoxCategoryId">
                                    <input class="btn" type="submit" value="{{$category->name}}">
                                </form>
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
        <div class="container container-about-us w-100">
            <div class="main-info">
                <h1>About us</h1>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam architecto atque, autem consequuntur deserunt dolore doloremque dolorum eaque eius expedita fugit illo laudantium mollitia quaerat quod, repellat vero, voluptatibus! Expedita!</span><span>Ad aliquid autem ducimus error itaque maxime nobis non sint vel! Accusamus aperiam assumenda beatae ea esse, id impedit laborum officiis optio provident quidem quod repellendus saepe sequi, voluptates! Minima!</span><span>Amet autem cum dicta dolorem doloremque dolores ducimus eligendi et expedita harum illum itaque nemo odit officiis perspiciatis porro praesentium provident quam quis reiciendis, rem repudiandae, sequi voluptatem! Quisquam, recusandae?</span><span>Doloremque esse est natus neque nihil non quos suscipit, tenetur. Aliquam assumenda autem cumque error hic id necessitatibus neque. Architecto esse et excepturi hic incidunt iusto libero mollitia nesciunt repellat.</span><span>Aliquid aspernatur assumenda aut beatae ducimus eligendi error fuga hic illo incidunt inventore ipsa iste minima minus modi nihil optio quasi quibusdam tempore temporibus, unde vero vitae, voluptas. Commodi, incidunt!</span></p>
            </div>
        </div>
    </div>
@endsection
