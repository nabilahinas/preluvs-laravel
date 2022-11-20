@extends('layouts.main')

@section('container')

<div class="section-margin" style="height: 20px ;"></div>
<div class="main-wrapper mt-4">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="col-xs-5">
            <div class="p-2 py-5">
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <h2 class="text-center fw-bolder">Edit your profile 📒📝</h2>
                </div>
                <div class="row mt-3">
                    <form method="post" action="/editprofile" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Picture</label>
                            <input class="form-control @error('user_pict') is-invalid @enderror" type="file"
                                id="formFile" name="user_pict">
                            @error('book_pict')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="user_name">Name</label>
                            <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                id="user_name" placeholder="Name" name="user_name"
                                value="{{ old('user_name', auth()->user()->user_name) }}" required />
                            @error('user_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username"
                                name="username" value="{{ old('username', auth()->user()->username) }}" required />
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email"
                                name="email" value="{{ old('email', auth()->user()->email) }}" required />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="user_phoneNumber">Phone Number</label>
                            <input type="tel" class="form-control @error('user_phoneNumber') is-invalid @enderror" id="user_phoneNumber" placeholder="Phone Number"
                                name="user_phoneNumber" value="{{ old('user_phoneNumber', auth()->user()->user_phoneNumber) }}" required />
                            @error('user_phoneNumber')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="user_address">Address</label>
                            <textarea class="form-control" id="user_address" placeholder="Address"
                                name="user_address" rows="3">{{ old('user_address', auth()->user()->user_address) }}</textarea>
                        </div>

                        <div class="mt-5 text-right">
                            <input type="submit" class="btn btn-prim profile-button" value="Save changes" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
