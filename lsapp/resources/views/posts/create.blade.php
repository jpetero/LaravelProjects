@extends("layouts.app")

@section("content")
    <h3>Create Post</h3>
    <form action="/projects/lsapp/public/posts" method="POST" enctype="multipart/form-data">
        {{-- Cross Side Request Forgery --}}
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="article-ckeditor" class="form-control" placeholder="Body text"></textarea>
        </div>

        <div class="form-group">
            <input type="file" name="cover_image" id="">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary" name="submit">
    </form>
@endsection