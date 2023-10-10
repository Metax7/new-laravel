<!doctype html>
<html lang="en">
<head>
    <script src="https://cdn.tiny.cloud/1/kd5ac50s0uciichi4n1iedrfytp75a7opjgejbbtz11dbvsw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image',
            height: 300,
            menubar: false
        });
    </script>
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
<body class="bg-slate-600">
<div class="max-w-screen-2xl mx-auto py-5">
    <button onclick="openClose()">
        <i class="fa-solid fa-bars fa-2xl text-white"></i>
    </button>
</div>
<div class="menu-admin w-0 transition-all duration-200 ease-linear overflow-hidden bg-slate-900 fixed left-0 top-0 h-full text-white space-y-5">
    <div class="flex justify-end border-b-2 border-slate-500">
        <button class="text-3xl p-3 text-slate-600 px-4 py-4" onclick="openClose()">
            <i class="fa-solid fa-circle-xmark"></i>
        </button>
    </div>
    <ul class="space-y-3 font-bold text-center text-xl">
        <li>
            <a href="{{ route('admin.home.index') }}">Home</a>
        </li>
        <li>
            <a href="{{ route('admin.about.index') }}">About</a>
        </li>
        <li>
            <a href="{{ route('admin.news.index') }}">News</a>
        </li>
    </ul>
    <ul class="border-b-2 border-t-2 py-5 border-slate-500">
        <li class="nav-item dropdown px-3 text-2xl font-bold text-slate-500">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
    </ul>

</div>
@yield('content')
<div>footer</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function openClose(){
        $('.menu-admin').toggleClass('w-80');
    }
</script>
</body>
</html>
