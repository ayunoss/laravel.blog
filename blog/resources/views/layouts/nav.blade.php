<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/">{{ __('nav.home')}}</a>
            <a class="nav-link" href="{{route('addPost')}}">{{ __('nav.add')}}</a>
            <a class="nav-link" href="#">{{ __('nav.hz')}}</a>
            <a class="nav-link" href="/contact">{{ __('nav.help')}}</a>
            @guest
                <a class="nav-link" id="auth" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="nav-link" id="auth" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a class="nav-link" id="auth" href="/home">{{ Auth::user()->name }}</a>
            @endguest
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ __('Choose language') }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('navPanel', ['locale' => 'ru']) }}">
                        {{ __('Russian') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('navPanel', ['locale' => 'en']) }}">
                        {{ __('English') }}
                    </a>
                </div>
            </li>
        </nav>
    </div>
</div>`
