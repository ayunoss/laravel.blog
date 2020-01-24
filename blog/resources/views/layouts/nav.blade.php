<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/">Home</a>
            <a class="nav-link" href="{{route('addPost')}}">New post</a>
            <a class="nav-link" href="#">Button</a>
            <a class="nav-link" href="/contact">Contact us</a>
            @guest
                <a class="nav-link" id="auth" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="nav-link" id="auth" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a class="nav-link" id="auth" href="/home">{{ Auth::user()->name }}</a>
            @endguest
        </nav>
    </div>
</div>`
