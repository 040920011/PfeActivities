 @extends('navigation.index')
@section('titre')
 Activities
@stop
@section('content')
    <div class="mt-[100px] flex flex-col">
        @if($errors->any())
            <div class="bg-red-200 border border-red-400 mb-4 text-red-700 px-4 py-3 rounded relative inline-block mx-auto" role="alert">
                <strong class="font-bold">Oops!</strong>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="GET" action="{{route('activities')}}" class="w-[90%] lg:w-[70%] mx-auto">
            <label for="default-search" class="mb-2 text-sm  font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input name="city" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search with Cities or Categories" required>
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>
    <section>
        @if (isset($categories))
            @foreach ($categories as $category)
                <h1 class="text-white head_info mt-[100px] md:text-[3rem] text-[2rem] text-center">{{$category->title}} Activities</h1>
                <div class="my-10 text-white mx-[auto] w-[70%]  sm:w-full lg:w-[80%]">
                @foreach ($activities as $activity)
                @if ($category->id == $activity->category_id)
                    <x-activitie :activitie='$activity'/>
                @endif
                @endforeach
                </div>
            @endforeach
        @else
            <div class="my-10 text-white mx-[auto] w-[70%]  sm:w-full lg:w-[80%]">
                @foreach ($activities as $activity)
                    <x-activitie :activitie='$activity'/>
                @endforeach
            </div>
        @endif
    </section>
