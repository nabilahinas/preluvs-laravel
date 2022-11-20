@extends('layouts.main')

@section('container')

<section class="genres section-margin" id="genres">
    <div class="container">
        <div class="row">
            <div class="title col d-flex justify-content-center">
                <h1 class="heading text-center mb-5 fs-2">Book genres</h1>
            </div>
            <div class="mb-2"></div>
        </div>
        <div class="row mt-5">
            @foreach ($categories as $category)
            <div class="col-lg-6 col-md-12 mb-sm-5 click-genre">
                <a href="/genres/{{ $category->category_slug }}">
                    <div class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3">
                        <p>
                            {{ $category->category_name }}
                        </p>
                        <div class="img-genre position-relative">
                            <img src=" {{ $category->category_pict }}" class="position-absolute end-0" alt="">
                        </div>
                    </div>
                </a>

            </div>
            @endforeach
            <!-- <div class="col-lg-6 col-md-12 mb-sm-5 click-genre">
                <a href="#">
                    <div class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3">
                        <p>
                            Novel
                        </p>
                        <div class="img-genre position-relative">
                            <img src="img/Novel.png" class="position-absolute end-0" alt="">
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-6 col-md-12 mb-sm-5 click-genre">
                <a href="#">
                    <div class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3">
                        <p>
                            Education
                        </p>
                        <div class="img-genre position-relative">
                            <img src="img/Education.png" class="position-absolute end-0" alt="">
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-6 col-md-12 mb-sm-5 click-genre">
                <a href="#">
                    <div class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3 h-100">
                        <p>
                            Technology
                        </p>
                        <div class="img-genre position-relative">
                            <img src="img/Technology.png" class="position-absolute end-0" alt="">
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-6 col-md-12 mb-sm-5 click-genre">
                <a href="#">
                    <div class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3 h-100">
                        <p>
                            Self Improvement
                        </p>
                        <div class="img-genre position-relative">
                            <img src="img/Selfimpr.png" class="position-absolute end-0" alt="">
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-6 col-md-12 mb-sm-5 click-genre">
                <a href="#">
                    <div class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3 h-100">
                        <p>
                            Poetry
                        </p>
                        <div class="img-genre position-relative">
                            <img src="img/Poetry.png" class="position-absolute end-0" alt="">
                        </div>
                    </div>
                </a>

            </div> -->
        </div>
    </div>
</section>



@endsection
