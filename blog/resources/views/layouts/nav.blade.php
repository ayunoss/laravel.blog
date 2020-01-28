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
                <form method="post" action="{{route('navPanel')}}">
                    {{ csrf_field() }}
                    <select name="langselect">
                        <option value="" selected="selected">select language</option>
                        <option VALUE="ru"> Rus </option>
                        <option VALUE="en"> Eng </option>
                    </select>
                    <input type="submit" value="Ok" />
                </form>
            </li>
        </nav>
    </div>
</div>`
