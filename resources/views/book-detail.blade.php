@extends('layouts.main')

@section('container')

<!-- breadcrumbs -->
<div class="bc section-margin">
    <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Books</a></li>
                <li class="breadcrumb-item"><a href="#">Comics</a></li>
                <li class="breadcrumb-item active fw-semibold" aria-current="page">Demon Slayer</li>
            </ol>
        </nav> -->
</div>

<!-- content -->
<section class="card p-3 m-4">
    <div class="row section-margin mt-lg-5 mt-4">
        <div class="picture col-lg-3 d-flex flex-column justify-content-center align-items-center">
            <div class="book-pict mb-4 shadow ">
                <img class="img-fluid rounded-2" src="/{{ $book->book_pict}}" alt="">
            </div>
            <div class="seller d-flex align-items-center justify-content-center">
                <img class="me-3 prof-pict" src="/img/comics-haikyuu.png" alt="">
                <a href="/user/{{ $book->seller->username }}" class="seller-name">{{ $book->seller->user_name }}</a>
            </div>
        </div>
        <div class="description col-lg-6 mt-5 mt-lg-0 mx-4 mx-lg-0">
            <div class="row genre-title-author">
                <div class="mb-3">
                    <a href="/genres/{{ $book->category->category_slug }}" class="badge">{{
                        $book->category->category_name }}</a>
                </div>
                <h3 class="fw-bolder">{{ $book->book_title }}</h3>
                <a href="">{{ $book->book_author }}</a>

            </div>
            <h3 class="my-3 fw-bold" style="color: #6c6d89;">Rp{{ $book->book_price }}</h3>
            <div class="row book-desc mt-4">
                <h5 class="fw-semibold">Description</h5>
                <p>{{ $book->book_description }}</p>
            </div>
            <div class="row details mt-4">
                <h5 class="fw-semibold">Details</h5>
                <div class="row">
                    <div class="col-6">
                        <div class="row page">
                            <p class="fs-6 mb-0">Page</p>
                            <p>{{ $book->book_pageNum }}</p>
                        </div>
                        <div class="row publish-date">
                            <p class="fs-6 mb-0">Publish Date</p>
                            <p>{{ $book->book_publishDate }}</p>
                        </div>
                        <div class="row isbn">
                            <p class="fs-6 mb-0">ISBN</p>
                            <p>{{ $book->book_isbn }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row publisher">
                            <p class="fs-6 mb-0">Publisher</p>
                            <p>{{ $book->book_publisher }}</p>
                        </div>
                        <div class="row lang">
                            <p class="fs-6 mb-0">Language</p>
                            <p>{{ $book->book_lang }}</p>
                        </div>
                        <div class="row qty">
                            <p class="fs-6 mb-0">Quantity</p>
                            <p>{{ $book->book_quantity }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttons col-lg-3 d-flex flex-column align-items-center">
            <form action="/cart/{{ $book->book_id }}" method="post" class="w-100">
                @csrf
                <input type="number" value="{{ $book->book_id }}" name="bookId" class="d-none">
                <button class="nav-link btn-prim me-lg-3 d-flex align-items-center justify-content-center w-100 border-0">
                    <i class='bx bx-cart-alt me-3'></i> Add to cart
                </button>
            </form>
            <form action="/wishlist/{{ $book->book_id }}" method="post" class="w-100">
                @csrf
                <input type="number" value="{{ $book->book_id}}" name="bookId" class="d-none">
                <button type="submit"
                    class="nav-link btn-second me-lg-3 mt-3 d-flex align-items-center justify-content-center w-100">
                    <i class='bx bx-bookmark me-3'></i> Add to wishlist
                </button>
            </form>
        </div>
    </div>

</section>

<!-- comment section -->
<section class="comment card p-3 m-4">
    <h5 class="fw-semibold mb-3">Comments (2)</h5>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
            style="height: 100px"></textarea>
        <label for="floatingTextarea2">Comments</label>
        <a class="nav-link btn-prim mt-3 d-flex align-items-center justify-content-center" href="#">
            Post
        </a>
    </div>
    <div class="user-comment card p-3 mb-2 d-flex flex-row">
        <img class="me-3 prof-pict" src="img/comics-haikyuu.png" alt="">
        <div class="comment-col">
            <div class="d-flex align-items-center mb-2">
                <p class="fw-semibold m-0">User name</p>
                <span class="m-2"></span>
                <p class="m-0 date-comment">16/08/22</p>
            </div>
            <div class="comment-text">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium nesciunt aperiam iusto.
                    Fuga vel natus amet cumque atque quibusdam nemo neque reprehenderit corrupti qui, inventore
                    voluptas, ipsum accusamus doloremque.</p>
            </div>
            <button class="btn btn-prim" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReply1"
                aria-expanded="false" aria-controls="collapseReply">
                Reply
            </button>
            <div class="collapse mt-2" id="collapseReply1">
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                    <a class="nav-link btn-second mt-3 d-flex align-items-center justify-content-center" href="#">
                        Post
                    </a>
                </div>
            </div>
            <div class="user-reply card p-3 my-2 d-flex flex-row">
                <img class="me-3 prof-pict" src="img/comics-haikyuu.png" alt="">
                <div class="comment-col">
                    <div class="d-flex align-items-center mb-2">
                        <p class="fw-semibold m-0">User name</p>
                        <span class="m-2"></span>
                        <p class="m-0 date-comment">16/08/22</p>
                    </div>
                    <div class="comment-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium nesciunt aperiam
                            iusto.
                            Fuga vel natus amet cumque atque quibusdam nemo neque reprehenderit corrupti qui,
                            inventore
                            voluptas, ipsum accusamus doloremque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user-comment card p-3 mb-2 d-flex flex-row">
        <img class="me-3 prof-pict" src="img/comics-haikyuu.png" alt="">
        <div class="comment-col">
            <div class="d-flex align-items-center mb-2">
                <p class="fw-semibold m-0">User name</p>
                <span class="m-2"></span>
                <p class="m-0 date-comment">16/08/22</p>
            </div>
            <div class="comment-text">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium nesciunt aperiam iusto.
                    Fuga vel natus amet cumque atque quibusdam nemo neque reprehenderit corrupti qui, inventore
                    voluptas, ipsum accusamus doloremque.</p>
            </div>
            <button class="btn btn-prim" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReply2"
                aria-expanded="false" aria-controls="collapseReply">
                Reply
            </button>
            <div class="collapse mt-2" id="collapseReply2">
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                    <a class="nav-link btn-second mt-3 d-flex align-items-center justify-content-center" href="#">
                        Post
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
