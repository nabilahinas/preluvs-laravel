@extends('layouts.main')

@section('container')

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-3">
        <div class="content">
            <div class="d-flex justify-content-center">
                <img class="img-responsive mb-4" src="img/BO8Y1D3.png">

            </div>
            <h5 class="mb-3">Enter Receipt Number <br> of your book </h5>
            <input class="form-control w-100" placeholder="Number">
            <button class="btn btn-prim d-block w-100 mt-2 sub-button">Save</button>
        </div>
    </div>

</div>

@endsection
