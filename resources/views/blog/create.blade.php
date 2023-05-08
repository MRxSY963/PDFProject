@extends('layouts.app')

@section('content')


<div class="container m-auto text-center pt-10 pb-5">
    <h1 class="text-4xl ">Create Post</h1>
</div>

<div class="container m-auto text-center pt-10 pb-5">
    <form action="/blog" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- Title --}}
        <input type="text" name="title" placeholder="Title" class="w-96 items-center text-left text-2xl h-14 rounded-lg shadow-lg border-b p-6 mb-5">
        <br>
        {{-- Description --}}
        <textarea name="description" placeholder="Description" class="w-96 px-10 items-center text-left text-xl h-32 rounded-lg shadow-lg border-b p-6 mb-5"></textarea>
        <br>    

        {{-- Uplaod File --}}
        <div class="flex items-center justify-center pb-10 ">
            <label for="dropzone-file" class="rounded-lg shadow-lg border-b flex flex-col items-center justify-center w-96 h-64 border-2 border-gray-300 border-dashed cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="text-base">Click to upload</span> or drag and drop Post image</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
              </div>
              <input id="dropzone-file" type="file" class="hidden pb-14" name="image" />
            </label>
          </div>
          
          <div class="w-96 text-center mx-auto h-20 bg-neutral-200 dark:bg-neutral-600 relative flex items-center">
            <div id="progress-bar" class="progressBar-1 p-2 rounded-lg text-center text-xs font-medium leading-none">
            </div>
            <div id="upload-icon" class="hidden absolute top-5 right-0 bottom-0 items-center justify-center">
                <svg class=" w-12 h-10 mb-10 ml-10 text-green-900 fill-current animate-upload-icon" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path d="M4.67 10.35l4.66 4.66L15.33 7.7l1.41 1.41-7.08 7.08L3.26 11.76l1.41-1.41z"/>
                </svg>
          </div>
          </div>
          
          
          
        {{-- Submit Button --}}
        <button class="bg-green-700 text-gray-300 p-3 border-gray-300 border-b rounded-xl shadow-2xl hover:bg-green-900 hover:text-gray-50 transition duration-500 ease-in-out" type="submit">submit the post</button>
    </form>
</div>


@endsection