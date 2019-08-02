<!-- Navigation section at the top -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin-bottom: 20px shadow-sm">
    <div class="container">
        {{-- The application branding, this can be the company logo --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        {{-- The toggleable button on the right of a small screen --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- The content that collapse download as the button is clicked --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                    <a href="/projects/lsapp/public" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/projects/lsapp/public/about" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="/projects/lsapp/public/services" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="/projects/lsapp/public/posts" class="nav-link">Blog</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                {{-- This will show up when a person hasn't signed in or guest --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    {{-- This will show when a user has logged in --}}
                    {{-- The create post button --}}
                    <li class="nav-item">
                        <a href="/projects/lsapp/public/posts/create" class="nav-link">Create Post</a>
                    </li>

                    {{-- The dropdown menu section --}}
                    <li class="nav-item dropdown">

                        {{-- The dropdown button with a name of a logged in person --}}
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        {{-- The logout section --}}
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/projects/lsapp/public/home">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>