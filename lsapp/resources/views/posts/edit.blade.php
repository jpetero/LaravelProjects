@extends("layouts.app")

@section("content")
    <div>
        <h3>Edit Post</h3>
    <form action="/projects/lsapp/public/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            {{-- Cross Side Request Forgery --}}
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
            <textarea name="body" id="article-ckeditor" class="form-control" placeholder="Body text">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <input type="file" name="cover_image" id="">
            </div>
            {{-- Add this line of codes to allow put request --}}
            <input type="hidden" name="_method" value="PUT">
            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
        </form>
    </div>
@endsection