@extends("layouts.app")

@section("content")
    <h3>Posts</h3>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/projects/lsapp/public/storage/cover_images/{{$post->cover_image}}" alt="No image found">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/projects/lsapp/public/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>  
            </div>       
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Post Found</p>
    @endif
@endsection