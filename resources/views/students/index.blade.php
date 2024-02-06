@extends('layouts.master')

@section('title', 'all students')

@section('content')

    <div class="container">

        <h1> Home Page </h1>


        <table class="table">
            <thead class="blue white-text">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                   @foreach ($students as $key=> $student)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->email }}</td>
                        <td><img
                            src="{{$student->image ? Storage::disk('public')->url('studentImg/'.$student->image)  : asset('files/img/images.png')}}"
                            alt=""
                        />

                        </td>
                        <td><a class="btn btn-raised btn-primary btn-sm" href="{{ route('students.edit',$student->id) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                        <td><a  class="btn btn-raised btn-danger btn-sm" href="{{ route('students.destroy',$student->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

                    </tr>
                   @endforeach

            </tbody>
        </table>

        {{ $students->links() }}



    </div>

@endsection
