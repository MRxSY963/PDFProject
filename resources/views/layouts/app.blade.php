<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}


    {{-- Website Title --}}
    <title>{{ config('app.name', 'Memo Blog') }}</title>

    {{-- Website Icon --}}
    <link rel="icon" type="image/x-icon" href="/images/WSTH.png">

    <!-- Css Files -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        a{
            text-decoration: none;
        }
    </style>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-gray-700 shadow-sm">
            <div class="container">
                <a class="navbar-brand a-white" href="{{ url('/') }}">
                    {{ config('app.name', 'Memo Blog') }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <a class="nav-link a-white" href="/blog">Blog</a>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link a-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link a-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link a-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    </ul>
                </div>
            </div>
        </nav>

        <main>
        <div>
            @yield('content')
        </div>
        <div>
            @include('layouts.footer')
        </div>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // const progressBar = document.getElementById('progress-bar');
        // const fileUpload = document.getElementById('dropzone-file');

        // function UploadBar(){
        //     progressBar.style.width = '100%';
        // }

        // fileUpload.addEventListener('change', function() {
        //     if (fileUpload.files.length > 0) {  
        //         progressBar.style.width = '100%';
        //     }
        // })

        document.addEventListener('DOMContentLoaded', function() {
            const fileUpload = document.getElementById('dropzone-file');
            const progressBar = document.getElementById('progress-bar');
            const uploadIcon = document.getElementById('upload-icon');
            const previewImage = document.querySelector('#preview-image');
                    
            fileUpload.addEventListener('change', function() {
                const file = this.files[0];
  
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    previewImage.setAttribute('src', this.result);
                });
  
                reader.readAsDataURL(file);


              
              if (fileUpload.files.length > 0) {
               let width = 0;
               const intervalId = setInterval(function() {
                 if (width >= 100) {
                   clearInterval(intervalId);
                   progressBar.classList.add('complete');
                   uploadIcon.classList.remove('hidden');
                 } else {
                   width++;
                   progressBar.style.width = width + '%';
                 }
               }, 10);
             }
            });
        });
        $(document).ready(function() {
                setTimeout(function() {
                    $('#alert-div').fadeOut('slow');
                }, 5000);
        });
    </script>
</body>
</html>
