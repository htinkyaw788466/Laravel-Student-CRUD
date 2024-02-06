@extends('layouts.master')

@section('title', 'student edit')

@section('content')
    <div class="container">

        <!-- Default form register -->
        <form class="text-center border border-light p-5" action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <p class="h4 mb-4">Update Student</p>

            <!-- Name -->
            <input type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name"
                value="{{ $student->name }}">
                @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                @enderror

            <!-- Phone number -->
            <input type="text"  class="form-control mb-4 @error('phone') is-invalid @enderror" name="phone"
            value="{{ $student->phone }}" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                @error('phone')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                    @enderror

            <!-- Address -->
            <input type="text" class="form-control mb-4 @error('address') is-invalid @enderror" name="address"
            value="{{ $student->address }}">
                @error('address')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                @enderror

            <!-- E-mail -->
            <input type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email"
            value="{{ $student->email }}">
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
            <a href="{{ route('students.index') }}" class="btn btn-success">Back</a>
            <button class="btn btn-info" type="submit">Update</button>

        </form>
        <!-- Default form register -->
    </div>


@endsection
