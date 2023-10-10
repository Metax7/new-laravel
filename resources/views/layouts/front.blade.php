<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="w-full bg-slate-700">
    <div class="max-w-screen-xl mx-auto">
        <div class="flex justify-between items-center py-5">
            <a href="{{route('app.home')}}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1969px-Laravel.svg.png"
                     class="w-16" alt="">
            </a>
            <ul class="flex space-x-5 text-white font-bold">
                <li>
                    <a href="{{route('app.home')}}"
                       class="hover:text-sky-300 transition-all duration-200 ease-linear">Home</a>
                </li>
                <li>
                    <a href="{{route('app.about')}}" class="hover:text-sky-300 transition-all duration-200 ease-linear">About</a>
                </li>
                <li>
                    <a href="{{route('app.news')}}"
                       class="hover:text-sky-300 transition-all duration-200 ease-linear">News</a>
                </li>
            </ul>
            <ul class="text-white font-bold text-xl">
                <li>
                    @guest
                    @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link hover:text-sky-300 transition-all duration-200 ease-linear"
                       href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link hover:text-sky-300 transition-all duration-200 ease-linear"
                       href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                </li>
            </ul>
        </div>

        @yield('content')
        <div>footer</div>
    </div>
</div>
</body>
</html>
