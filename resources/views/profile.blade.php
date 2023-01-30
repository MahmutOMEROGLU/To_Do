@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="text-center mt-3">
                    <img src="{{asset(auth()->user()->image)}}" alt="" width="82px" height="82px">
                    <h3>
                        {{auth()->user()->name}}
                    </h3>

                    <div class="card-body">
                        <form action="/profile" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
                                @error('name')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">
                                @error('email')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirmation">Password</label>
                                <input type="password-confirmation" name="password-confirmation" id="password-confirmation" class="form-control">
                                @error('password-confirmation')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" id="image-label" class="form-label">Change User Photo</label>
                                <input class="form-control" type="file" name="image" id="image">
                                @error('image')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="d-flex mt-5 mb-3 flex-row-reverse">
                                <button type="submit" class="btn btn-primary mx-2">Save</button>
                                <button type="submit" class="btn btn-light" form="logout">Logout</button>
                            </div>
                        </form>

                        <form action="/logout" id="logout" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
