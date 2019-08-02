{{-- You are bringing in the app.blade.php file --}}
@extends('layouts/app')


{{-- This section is going to be delivered at the content yield in the app.blade.php file--}}
@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Maxime laboriosam veritatis commodi quisquam, voluptatibus 
                rerum consequuntur sunt sequi officia rem.
            </p>

            <p>
                <a href="./login" role="button" class="btn btn-primary btn-lg">Login</a> 
                <a href="./register" role="button" class="btn btn-success btn-lg">Register</a>
            </p>
    </div>
@endsection

