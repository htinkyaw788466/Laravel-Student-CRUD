@extends('layouts.master')

@section('title', 'student create')

@section('content')
    <div class="container">

        <!-- Default form register -->
        <form class="text-center border border-light p-5" action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <p class="h4 mb-4">Add Student</p>

            <!-- Name -->
            <input type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name"
                placeholder="name">
                @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                @enderror

            <!-- Phone number -->
            <input type="text"  class="form-control mb-4 @error('phone') is-invalid @enderror" name="phone"
                placeholder="phone" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                @error('phone')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                    @enderror

            <!-- Address -->
            <input type="text" class="form-control mb-4 @error('address') is-invalid @enderror" name="address"
                placeholder="address">
                @error('address')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                @enderror

            <!-- E-mail -->
            <input type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email"
                placeholder="E-mail">
                @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                @enderror

            <!-- File -->
            <input type="file" class="form-control mb-4 @error('image') is-invalid @enderror" name="image"
                placeholder="Image">
                @error('image')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                @enderror

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Add Data</button>

        </form>
        <!-- Default form register -->
    </div>


@endsection
