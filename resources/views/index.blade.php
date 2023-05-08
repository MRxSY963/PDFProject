@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <div class="hero-bg-image flex flex-col items-center justify-center">
        <h1 class="text-gray-100 text-center text-5xl uppercase font-blod pb-10">Welcome to my Blog</h1>
        <a href="/blog" class="text-decoration-none bg-gray-100 text-gray-700 py-4 px-5 rounded-lg font-bold uppercase text-xl hover:text-black">Start Reading</a>
    </div>


    <!--How to be an expert-->
    <div class="container sm:grid grid-cols-2 gap-15 mx-auto py-15 pt-5 !important">
        <div class="pr-9 sm:mx-2 md:mx-0">
            <img class="sm:rounded-lg sm:grid-cols-1" src="https://picsum.photos/id/239/960/820" alt="">
        </div>

        <div class="flex flex-col items-left justify-center sm:m-10">
            <h2 class="font-bold text-gray-700 text-4xl uppercase text-center">How to be an expert in 2023</h2>
            <p class="font-bold text-gray-600 text-xl pt-2">
                You can find a list of all programming languages here.
            </p>

            <p class="py-4 text-gray-500 text-small leading-6">
                The world is constantly changing and evolving, and with each passing day, new challenges and opportunities arise. It is up to each individual to navigate these changes and find ways to adapt and grow. Whether it's in our personal or professional lives, we must learn to be resilient and flexible, to embrace change and innovation, and to always strive for improvement. With a positive attitude and a willingness to learn and grow, we can achieve great things and make a positive impact on the world around us.
            </p>

            <a href="/" class="text-decoration-none bg-gray-700 items-center text-center text-l place-self-start text-gray-300 py-4 px-5 rounded-lg font-bold uppercase text-xl hover:text-gray-100 hover:bg-gray-900">Read More</a>
        </div>
    </div>

    <!--Blog Catagories-->
    <div class="text-center p-14 bg-gray-700 text-gray-100">
        <h2 class="text-2xl">Blog Categories</h2>
        <div class="container mx-auto pt-10 sm:grid grid-cols-4">
            <div class="font-bold text-3xl py-2 pr-3">UX Design Thinking</div>
            <div class="font-bold text-3xl py-2 pr-3">Programming Languages</div>
            <div class="font-bold text-3xl py-2 pr-3">Graphic Design</div>
            <div class="font-bold text-3xl py-2 pr-3">Front-End Develpment</div>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="container mx-auto text-center py-14">
        <h2 class="font-blod text-5xl py-10">Recent Posts</h2>
        <p class="text-gray-400 leading-6 px-10">
            The world is constantly changing and evolving, and with each passing day, new challenges and opportunities arise. It is up to each individual to navigate these changes and find ways to adapt and grow. Whether it's in our personal or professional lives, we must learn to be resilient and flexible, to embrace change and innovation, and to always strive for improvement. With a positive attitude and a willingness to learn and grow, we can achieve great things and make a positive impact on the world around us.</p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 mx-auto">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="block m-auto pt-4 pb-14 w-4/5">

                <ul class="md:flex flex-wrap text-xs gap-2">
                    <li class="bg-yellow-100 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 transition duration-300"><a class="text-yellow-700   hover:text-yellow-100" href="/">PHP</a></li>
                    <li class="bg-yellow-100 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 transition duration-300"><a class="text-yellow-700   hover:text-yellow-100" href="/">Programming</a></li>
                    <li class="bg-yellow-100 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 transition duration-300"><a class="text-yellow-700   hover:text-yellow-100" href="/">Languages</a></li>
                    <li class="bg-yellow-100 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 transition duration-300"><a class="text-yellow-700   hover:text-yellow-100" href="/">Backend</a></li>
                </ul>

                <h3 class="text-l py-10 leading-6">
                    PHP Programming Languages Backend
                    The internet has revolutionized the way we communicate, work, and access information. It has made it possible for people to connect with each other from different parts of the world in real-time, and has opened up new opportunities for businesses and individuals alike. With the rise of social media platforms and online marketplaces, the internet has become a central hub for social interaction, commerce, and entertainment.
                </h3>

                <a href="/" class="bg-transparent border-2 text-gray-100 py-2 px-3 rounded-lg uppercase text-xl  hover:text-yellow-200">Read More</a>
            </div>
        </div>

       <div class="flex">
        <img class="sm:grid-cols-1 object-cover" src="https://picsum.photos/id/242/2960/2920" alt="">
       </div>
    </div>
@endsection