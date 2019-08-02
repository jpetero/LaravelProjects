@extends("layouts/app")

    @section("content")
        <div>
            {{-- You use the php tag to render the dynamic data into the view as well --}}
            <h1><?php echo $title ?></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Maxime laboriosam veritatis commodi quisquam, voluptatibus 
            rerum consequuntur sunt sequi officia rem. Lorem ipsum, dolor sit amet
            consectetur adipisicing eliderit neque animi iure accusamus labore.</p>
        </div>
    @endsection