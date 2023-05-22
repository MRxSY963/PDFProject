@extends('layouts.app')

@section('content')


@if (session()->has('success'))
<div class="p-4 mt-3 alert container mb-4 text-sm text-green-800 rounded-lg bg-green-300 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Success </span> {{session()->get('success')}}
</div>
@endif


<section class="bg-gray-50 sectionAfterAlert dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="" style="padding-left: 2.5rem !important;">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    </button>

                    <!-- Modal toggle -->
                    <div class="flex justify-center m-5">
                        <button id="defaultModalButton" data-modal-toggle="defaultModal" class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                            Create Course
                        </button>
                    </div>

                    <!-- Main modal -->
                    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <!-- Modal header -->
                                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Add Course
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->



                                <form action="{{ route('CoursesAll.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                        <div class="sm:col-span-2">
                                            <label for="Course_names" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input type="text" name="Course_names" id="Course_names" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                        </div>
                                        <div>
                                            <label for="Course_prices" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                            <input type="number" name="Course_prices" id="Course_prices" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                                        </div>
                                        <div>
                                            <label for="Course_categorys" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                            <select id="Course_categorys" name="Course_categorys" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected="">Select category</option>
                                                <option value="Online">Online</option>
                                                <option value="Attendance">Attendance</option>
                                            </select>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="Course_descriptions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <textarea id="Course_descriptions" name="Course_descriptions" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        Add new Course
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Course name</th>
                            <th scope="col" class="px-4 py-3">Category</th>
                            <th scope="col" class="px-4 py-3">Description</th>
                            <th scope="col" class="px-4 py-3">Price</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $course_count = 0;
                        @endphp
                        @foreach ($Courses as $course)
                        @php
                        $course_count++;
                        @endphp
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$course->course_name}}</th>
                            <td class="px-4 py-3">{{$course->course_type}}</td>
                            <td class="px-4 py-3">{{$course->description_of_course}}</td>
                            <td class="px-4 py-3">${{$course->price}}</td>
                            <td class="px-1 py-1 m-auto">
                                <a href="{{ route('CoursesAll.edit', $course->id , '/edit') }}">
                                    <button class="inline-flex items-center p-1.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100 edit-delete" type="button">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </a>
                                
                                </form>
                                <button class="inline-flex items-center p-1.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100 delete-edit" type="button">
                                    <i style="fill:red !important; color: red !important;" class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach

                        <!-- Modal body -->

                    </tbody>
                </table>
            </div>
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing
                    <span class="font-semibold text-gray-900 dark:text-white">1-{{$course_count}}</span>
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">{{$course_count}}</span>
                </span>
            </nav>
        </div>
    </div>
</section>





@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var courses = document.querySelectorAll('.course');
        var loadMoreButton = document.getElementById('loadMoreButton');
        var showThirdSectionButton = document.getElementById('showThirdSectionButton');
        var coursesPerPage = 10;
        var currentPage = 1;

        // إظهار العناصر الأولى العشر فقط
        for (var i = 0; i < coursesPerPage; i++) {
            courses[i].classList.remove('hidden');
        }

        // التحقق من إذا كان هناك المزيد من العناصر للعرض
        if (courses.length <= coursesPerPage) {
            loadMoreButton.classList.add('hidden');
        }

        // تحميل المزيد من العناصر عند الضغط على الزر
        loadMoreButton.addEventListener('click', function() {
            var startIndex = currentPage * coursesPerPage;

            for (var i = startIndex; i < startIndex + coursesPerPage; i++) {
                if (courses[i]) {
                    courses[i].classList.remove('hidden');
                }
            }

            // إظهار الزر إذا كانت هناك المزيد من العناصر
            if (courses.length <= (currentPage + 1) * coursesPerPage) {
                loadMoreButton.classList.add('hidden');
            }

            currentPage++;
        });

        // إظهار الجزء الثالث عند الضغط على الزر
        showThirdSectionButton.addEventListener('click', function() {
            var thirdSectionStartIndex = 2 * coursesPerPage;

            for (var i = thirdSectionStartIndex; i < courses.length; i++) {
                courses[i].classList.remove('hidden');
            }

            // إخفاء الزر
            showThirdSectionButton.classList.add('hidden');
        });
    });

</script>
@endpush


@endsection
