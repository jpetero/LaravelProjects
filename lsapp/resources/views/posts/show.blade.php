@extends("layouts/app")

@section("content")
    <div style="padding-top: 20px">
        <a href="/projects/lsapp/public/posts" class="btn btn-dark">Go Back</a>
        <h1>{{$post->title}}</h1>
        <img style="width:100%" src="/projects/lsapp/public/storage/cover_images/{{$post->cover_image}}" alt="No image found">
        <br><br>
        <div>
            {{-- {{$post->body}} --}}

            {{-- To parse the HTML brought by the ckeditor --}}
            {!!$post->body!!}
        </div>  
        <hr>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        <hr>

        {{-- Do not show the delete and the edit button if the user is a guess 
         i.e. if the user is not signed in    
        --}}
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                {{-- The edit button --}}
                <a href="/projects/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a>
                
                {{-- The delete button --}}
                <form action="/projects/lsapp/public/posts/{{$post->id}}" class="float-right" method="POST">
                    {{-- Cross Side Request Forgery --}}
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            @endif
        @endif
    </div>
@endsection