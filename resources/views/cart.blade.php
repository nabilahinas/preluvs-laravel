@extends('layouts.main')

@section('container')

    <div class="wrapper">
        <h1 class="fw-bold">Shopping Cart</h1>
        <div class="project">
            <div class="shop">
                @if ($itemcart->count())
                    @foreach ($itemcart as $cart)
                    <div class="box">
                        <img src="{{ $cart->book->book_pict }}" alt="">
                        <div class="content">
                            <h3 class="fw-bold">{{ $cart->book->book_title }}</h3>
                            <h4>Price: IDR. {{ $cart->book->book_price }}</h4>
                            <p class="unit">Quantity: <input value="{{ $cart->book->book_quantity }}"></p>
                            <p class="btn-area bg-danger">
                                <i class='bx bx-trash'></i>
                                <span class="btn2">Remove</span>
                            </p>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="col text-center">
                    <div class="alert alert-secondary text-center" role="alert">Nothing here...</div>
                </div>
                @endif
            </div>
            <div class="right-bar">
                <p><span>Subtotal</span> <span>$120</span></p>
                <hr>
                <p><span>Tax (5%)</span> <span>$20</span></p>
                <hr>
                <p><span>Shipping</span> <span>$70</span></p>
                <hr>
                <p><span>Total</span> <span>$210</span></p>

                <a href="#"><i class="fa fa-shopping-cart me-2"></i> Checkout</a>
            </div>
        </div>
    </div>

@endsection
