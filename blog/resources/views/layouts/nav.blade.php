<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link @if(Route::currentRouteName() === 'index') active @endif" href="{{ route('index') }}">{{ __('nav.home')}}</a>
            <a class="nav-link @if(Request::route()->getName() === 'addPost') active @endif" href="{{ route('addPost') }}">{{ __('nav.add')}}</a>
            <a class="nav-link" href="#">{{ __('nav.hz')}}</a>
            <a class="nav-link @if(Route::currentRouteName() === 'contact') active @endif" href="{{ route('contact') }}">{{ __('nav.help')}}</a>
            @guest
                <a class="nav-link" id="auth" href="{{ route('login') }}">{{ __('nav.login') }}</a>
                @if (Route::has('register'))
                    <a class="nav-link" id="auth" href="{{ route('register') }}">{{ __('nav.register') }}</a>
                @endif
            @else
                <a class="nav-link" id="auth" href="/home">{{ Auth::user()->name }}</a>
            @endguest
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ __('nav.lang') }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('navPanel', ['locale' => 'ru']) }}">
                        {{ __('nav.ru') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('navPanel', ['locale' => 'en']) }}">
                        {{ __('nav.en') }}
                    </a>
                </div>
            </li>
        </nav>
    </div>
</div>`
