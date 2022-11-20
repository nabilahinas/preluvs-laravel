@extends('layouts.main')

@section('container')

    <!-- content container -->
    <div class="content-container m-4">
        <h1 class="fw-bold text-center mb-5">Checkout</h1>
        <div class="row">
            <div class="details-checkout col-lg-8">
                <!-- address -->
                <section class="address card p-3">
                    <h5 class="mb-4 fw-bolder">Address</h5>
                    <p class="mb-2">My Address</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor doloribus fugit, repellat qui
                        molestiae sint recusandae.</p>
                    <a class="nav-link btn-second mt-3 d-flex align-items-center justify-content-center" href="#"
                        data-bs-toggle="modal" data-bs-target="#addressEdit">
                        <i class='bx bx-pencil me-2'></i> Edit address
                    </a>
                    <div class="modal fade" id="addressEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit address</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Phone:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">City:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Address:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="payment-select card p-3 mt-4">
                    <h5 class="mb-4 fw-bold">Select Payment</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <img class="img-fluid mx-3" src="img/bca-logo.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault1">
                            BCA Virtual Account
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <img class="img-fluid mx-3" src="img/mandiri-logo.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Mandiri Virtual Account
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <img class="img-fluid mx-3" src="img/bni-logo.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault2">
                            BNI Virtual Account
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <img class="img-fluid mx-3" src="img/GoPay.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault2">
                            GoPay
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <img class="img-fluid mx-3" src="img/logo-ovo.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault2">
                            OVO
                        </label>
                    </div>
                </section>
                <section class="order card p-3 mt-4">
                    <h5 class="mb-4 fw-bold">Order details</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><img src="img/comics-demonslayer.png" alt="" width="100"></td>
                                <td>Demon Slayer Comic</td>
                                <td><a href="#">@username</a></td>
                                <td class="fw-bold">Rp. 20.000</td>
                            </tr>
                            <tr>
                                <td><img src="img/comics-miko.png" alt="" width="100"></td>
                                <td>Miiko Comic</td>
                                <td><a href="#">@username</a></td>
                                <td class="fw-bold">Rp. 25.000</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
            <div class="total-price col-lg-4 card p-3  mt-lg-0 mt-3">
                <!-- <h5 class="mb-4 fw-bold">Total price</h5> -->
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="fw-bold">Subtotal</td>
                            <td></td>
                            <td>Rp. 45.000</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Shipping cost</td>
                            <td></td>
                            <td>Rp. 9.000</td>
                        </tr>
                        <tr>
                            <td><h5 class="mb-4 fw-bold">Total price</h5></td>
                            <td></td>
                            <td><h5 class="mb-4 fw-bold">Rp. 54.000</h5></td>
                        </tr>
                    </tbody>
                </table>
                <a class="nav-link btn-prim mt-3 d-flex align-items-center justify-content-center" href="#" >
                    Proceed to payment
                </a>
            </div>
        </div>
    </div>

@endsection