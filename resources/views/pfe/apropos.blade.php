@extends('navigation.index')
@section('titre')
 Activities
@stop
@section('content')

<section class="flex mt-[50px] items-center py-10 bg-stone-100 font-poppins dark:bg-gray-800 lg:h-[calc(100%_-_50px)]">
    <div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-6 ">
        <div class="flex flex-wrap ">
            <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-1">
                <div class="relative">
                    <img src="/storage/images/aproposImg.jpg" alt=""
                        class="relative z-10 object-cover w-full h-96 lg:rounded-tr-[80px] lg:rounded-bl-[80px] rounded">
                    <div
                        class="absolute hidden w-full h-full bg-blue-400 rounded-bl-[80px] rounded -bottom-6 right-6 lg:block">
                    </div>
                    <div
                        class="absolute  text-blue-400 transform -translate-y-1/2 cursor-pointer top-1/2 left-[46%] hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="w-14 h-14 bi bi-play-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0 ">
                <div class="relative">
                    <h1 class="absolute -top-20 left-0 text-[20px] lg:text-[100px] text-gray-900 font-bold  dark:text-gray-200 opacity-5 md:block hidden">
                        About Us
                    </h1>
                    <h1 class="pl-2 text-3xl font-bold border-l-8 border-blue-400 md:text-5xl dark:text-white">
                        Welcome to our site
                    </h1>
                </div>
                <p class="mt-6 mb-10 text-base leading-7 text-gray-500 dark:text-gray-400">
                    Activities is a website that allows you to book the activity you want. Set of phenomena by which certain forms of life, a process, a functioning are manifested: Physical and intellectual activity. 2. Faculty, power to act; manifestation of this faculty: A man overflowing with activity. Set of phenomena by which certain forms of life, a process, a functioning are manifested: Physical and intellectual activity. 2. Faculty, power to act; manifestation of this faculty: A man overflowing with activity.
                </p>
                <a href="#"
                    class="px-4 py-3 text-gray-50 transition-all transform bg-blue-400 rounded-[80px] hover:bg-blue-500 dark:hover:text-gray-100 dark:text-gray-100 ">
                    Learn more
                </a>
            </div>

        </div>
        <div class="flex justify-center bg-stone-100 mt-6 lg:mt-12">
                <a href="#" class="text-blue-500 hover:text-blue-700 mr-4"><i class="fab fa-facebook-f text-xl"></i></a>
                <a href="#" class="text-blue-400 hover:text-blue-600 mr-4"><i class="fab fa-twitter text-xl"></i></a>
                <a href="#" class="text-pink-500 hover:text-pink-700"><i class="fab fa-instagram text-xl"></i></a>
        </div>

    </div>


</section>

