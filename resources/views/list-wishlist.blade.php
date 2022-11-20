@extends('layouts.main')

@section('container')

<div class="wrapper">

    <div class="d-flex justify-content-center align-items-center mb-3 section-margin">
        <h2 class="text-center fw-bolder">{{ auth()->user()->user_name }} 's Wishlist</h2>
    </div>

    <div id="products" class="container d-flex justify-content-between">
        <div class="row row-cols-2 row-cols-lg-4 row-cols-sm-1 w-100">
            @if ($itemwishlist->count())
            @foreach ($itemwishlist as $wl)
            <div class="col-lg col">
                <div class="card card-body p-lg-4 p-sm-3 rounded-4 mx-3 mb-3">
                    <div class="img-wrapper">
                        <img src="/{{ $wl->book->book_pict }}" alt="" class="img-container rounded-4">
                    </div>
                    <a href="/books/{{ $wl->book->id }}""><h4 class=" title mt-3">{{ $wl->book->book_title }}</h4>
                        </a>
                    <p class="author">{{ $wl->book->book_author }}</p>
                    <div>
                        <a href="/genres/{{ $wl->book->category->category_slug }}" class="badge">{{
                            $wl->book->category->category_name }}</a>
                    </div>
                    <div class="detail d-flex justify-content-between align-items-center mt-2">
                        <h5 class="price fw-semibold m-0">
                            Rp{{ $wl->book->book_price }}
                        </h5>
                        <form action="/cart/{{ $wl->book->id }}" method="post">
                            @csrf
                            <button type="submit" href="" class="btn-cart rounded text-center"><i
                                    class='bx bx-cart-alt'></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col text-center w-100">
                <div class="alert alert-secondary text-center" role="alert">Nothing here...</div>
            </div>
            @endif

        </div>
    </div>
</div>

<script>
    function filterProduct(value) {
        //Button class code
        let buttons = document.querySelectorAll(".button-value");
        buttons.forEach((button) => {
            //check if value equals innerText
            if (value.toUpperCase() == button.innerText.toUpperCase()) {
                button.classList.add("active");
            } else {
                button.classList.remove("active");
            }
        });
    }
</script>

@endsection
