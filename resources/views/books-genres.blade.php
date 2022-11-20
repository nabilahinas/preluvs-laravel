@extends('layouts.main')

@section('container')

<div class="wrapper">
    <div id="buttons" class="d-flex justify-content-center">
        <button class="button-value mx-2" onclick="">
            All
        </button>
        @foreach ($categories as $category)
            <button class="button-value mx-2" onclick="">{{ $category->category_name }}</button>
        @endforeach
        <!-- <button class="button-value mx-2" onclick="filterProduct('Comic')">
            Comic
        </button>
        <button class="button-value mx-2" onclick="filterProduct('Novel')">
            Novel
        </button>
        <button class="button-value mx-2" onclick="filterProduct('Education')">
            Education
        </button>
        <button class="button-value mx-2" onclick="filterProduct('Technology')">
            Technology
        </button>
        <button class="button-value mx-2" onclick="filterProduct('Sains')">
            Sains
        </button> -->
    </div>
    <div id="products" class="container d-flex justify-content-center">
        <div class="row">
            @foreach ($books as $book)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card card-body p-lg-4 p-sm-3 rounded-4 mx-3 mb-3">
                    <img src="{{ $book->book_pict }}" alt="" class="img-container rounded-4">
                    <h4 class="title mt-3">{{ $book->book_title }}</h4>
                    <p class="author">{{ $book->book_author }}</p>
                    <div>
                        <a href="/genres/{{ $book->category->category_slug }}" class="badge">{{ $book->category->category_name }}</a>
                    </div>
                    <div class="detail d-flex justify-content-between align-items-center mt-2">
                        <h5 class="price fw-semibold m-0">
                            Rp{{ $book->book_price }}
                        </h5>
                        <a href="" class="btn-cart rounded text-center"><i class='bx bx-cart-alt'></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
