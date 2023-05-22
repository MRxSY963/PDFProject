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
    <link rel="stylesheet" href="/css/login-form.css">
    <link href="https://fonts.googleapis.com/css2?family=Sigmar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
    @vite(['resources/css/app.css'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    


</head>
<body>

    <header>
        <nav class="bg-dark-800 border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ config('app.name', 'Memo Blog    ') }}</span>
                </a>
                <div class="flex items-center lg:order-2">
                    @guest
                    @if (Route::has('login'))

                    <a href="{{ route('login') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" style="transform: translate(-00%, -6%);">Log in</a>

                    @endif

                    @if (Route::has('register'))

                    <a href="{{ route('register') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" style="transform: translate(-00%, -6%);">Register</a>

                    @endif

                    @else
                    <li class="nav-item dropdown text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" style="margin-top: 15px; list-style-type: none; transform: translate(-00%, -20%);">
                        <a id="navbarDropdown" class="nav-link a-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                          </form>
                        </div>
                    </li>

                    @endguest
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false" style="transform: translate(0px, -12px);">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2" style="transform: translate(0px, -12px);">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3  rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Company</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Marketplace</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Features</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Team</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

        {{-- Loading Effect --}}

        <svg class="ip loader" viewBox="0 0 256 128" width="256px" height="128px" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="grad1" x1="0" y1="0" x2="1" y2="0">
                    <stop offset="0%" stop-color="#5ebd3e" />
                    <stop offset="33%" stop-color="#ffb900" />
                    <stop offset="67%" stop-color="#f78200" />
                    <stop offset="100%" stop-color="#e23838" />
                </linearGradient>
                <linearGradient id="grad2" x1="1" y1="0" x2="0" y2="0">
                    <stop offset="0%" stop-color="#e23838" />
                    <stop offset="33%" stop-color="#973999" />
                    <stop offset="67%" stop-color="#009cdf" />
                    <stop offset="100%" stop-color="#5ebd3e" />
                </linearGradient>
            </defs>
            <g fill="none" stroke-linecap="round" stroke-width="16">
                <g class="ip__track" stroke="#ddd">
                    <path d="M8,64s0-56,60-56,60,112,120,112,60-56,60-56"/>
                    <path d="M248,64s0-56-60-56-60,112-120,112S8,64,8,64"/>
                </g>
                <g stroke-dasharray="180 656">
                    <path class="ip__worm1" stroke="url(#grad1)" stroke-dashoffset="0" d="M8,64s0-56,60-56,60,112,120,112,60-56,60-56"/>
                    <path class="ip__worm2" stroke="url(#grad2)" stroke-dashoffset="358" d="M248,64s0-56-60-56-60,112-120,112S8,64,8,64"/>
                </g>
            </g>
        </svg>



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
    <script src="/js/login-form.js"></script>
</body>
</html>
