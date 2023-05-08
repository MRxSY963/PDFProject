@extends('layouts.app')

@section('content')



@if (session()->has('message'))
    <div id="alert-div" class="alert-update bg-blue-100 border-t-4 alert-update border-blue-400 rounded-b text-blue-800 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                </svg>
            </div>
        <div class="mt-2">
            <p class="font-bold">{{session()->get('message')}}</p>
            <p class="text-sm">Make sure you know how these changes affect you.</p>
        </div>
        </div>
    </div>
@endif





<div class="container m-auto text-center pt-5">
    <h1 class="text-4xl ">{{$post->title}}</h1>
</div>

<div class="container w-full gap-15 mx-auto py-14 px-5 border-b border-gray-300">
    <div class="flex">
        <img class="object-cover" src="/images/{{$post -> image_path}}" alt="">
    </div>

    <div class="mx-auto px-10">
        <div>
            
            <p class="text-l text-gray-700 py-8 leading-6">
                {{$post -> description}}
            </p>
        </div>
    </div>
    <div class=" flex text-center items-center justify-center ">
        @if (Auth::check() && Auth::user()->id == $post->user_id)
        <div class="justify-center  inline-block items-center mx-auto text-center pb-8">
            <a href="/blog/{{$post -> slug}}/edit" class="bg-green-600 border-2 text-gray-100 py-1 px-2 rounded-lg tracking-widest uppercase text-l  hover:text-gray-400 hover:bg-green-800">Edit Post</a>
        </div>

        <form action="/blog/{{$post -> slug}}" class="inline-block mx-auto" method="post">
        @csrf
        @method('delete')

        <div class="justify-center items-center mx-auto text-center pb-8">
            <button type="submit" class="bg-red-600 border-2 text-gray-100 py-1 px-2 rounded-lg tracking-widest uppercase text-l  hover:text-gray-400 hover:bg-red-800">Delete Post</button>
        </div>

        </form>
        @endif
    </div>
    <div class="items-center text-center">
        By: <span class="text-gray-500 italic">{{$post -> user->name}}</span>
             on <span class="text-gray-500 italic">{{ date('d-m-Y', strtotime($post->updated_at)) }}</span>
    </div>
</div>


@endsection