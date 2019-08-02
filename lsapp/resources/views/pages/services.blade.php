{{-- All the content from the app.blade.php is brought up here --}}
@extends("layouts/app")

    {{-- The content below is injected in the app.blade.php extended here --}}
    @section("content")
    <div>
        <h1>{{$title}}</h1>
        @if(count($services > 0))
            <ul class="list-group">
                @foreach($services as $service)
                  <li class="list-group-item">{{$service}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    @endsection