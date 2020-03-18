{{--<input type="checkbox" id="check">--}}
{{--<label for="check">--}}
{{--    <i class="fas fa-bars" id="open"></i>--}}
{{--    <i class="fas fa-times" id="close"></i>--}}
{{--</label>--}}
<span class="slide">
    <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars" id="open"></i>
    </a>
</span>
<div id="menu" class="nav">
    <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
    </a>
    <ul class="nav-ul">
        <li class="nav-li"><a class="nav-link @if(Route::currentRouteName() === 'index') active @endif" href="{{ route('index') }}">{{ __('nav.home')}}</a></li>
        <li class="nav-li"><a class="nav-link @if(Request::route()->getName() === 'addPost') active @endif" href="{{ route('addPost') }}">{{ __('nav.add')}}</a></li>
        <li class="nav-li"><a class="nav-link" href="#">{{ __('nav.hz')}}</a></li>
        <li class="nav-li"><a class="nav-link @if(Route::currentRouteName() === 'contact') active @endif" href="{{ route('contact') }}">{{ __('nav.help')}}</a></li>
{{--            @guest--}}
{{--                <li class="nav-li"><a class="nav-link" id="auth" href="{{ route('login') }}">{{ __('nav.login') }}</a></li>--}}
{{--            @if (Route::has('register'))--}}
{{--                <li class="nav-li"><a class="nav-link" id="auth" href="{{ route('register') }}">{{ __('nav.register') }}</a></li>--}}
{{--            @endif--}}
{{--            @else--}}
{{--                <li class="nav-li"><a class="nav-link" id="auth" href="/home">{{ Auth::user()->name }}</a></li>--}}
{{--            @endguest--}}

{{--                <li class="nav-item dropdown nav-li">--}}
{{--                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                    {{ __('nav.lang') }}--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                    <a class="dropdown-item" href="{{ route('navPanel', ['locale' => 'ru']) }}">--}}
{{--                        {{ __('nav.ru') }}--}}
{{--                    </a>--}}
{{--                    <a class="dropdown-item" href="{{ route('navPanel', ['locale' => 'en']) }}">--}}
{{--                        {{ __('nav.en') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                </li>--}}
    </ul>
</div>
