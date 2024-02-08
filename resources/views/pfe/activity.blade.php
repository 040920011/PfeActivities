@extends('navigation.index')

@section('titre')
    Show Activity
@endsection
@section('content')
<section class="relative text-white mt-[150px] w-full">
    <div class="flex flex-row rounded-xl h-[70%] bg-white w-[80%] lg:w-[70%] mx-auto text-[#111]">
        <img class="pr-2 pl-0 rounded-xl w-[50%] h-full" src="{{ url("/storage/images/{$activity->image->url}")}}" alt="image">
        <div class="w-[50%]">
            <strong>{{$category->title}}</strong>
            <h1 class='text-center mt-8 mx-4 py-2 md:text-lg rounded-xl text-white bg-black'>{{$activity->title}}</h1>
            @if($errors->any())
                {!! implode('', $errors->all('<div class="my-2 text-red-500">:message</div>')) !!}
            @endif
            <p>Description  :{{$activity->description}}</p>
            <button  class="w-full block h-[45px] p-0 mt-[150px] mb-4"><a class="block w-[80%] mx-[auto] lg:w-[70%] text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full md:text-lg px-5 py-2.5 text-center  mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                   href="{{route('addReservation',$activity)}}">reserver</a></button>
            {{-- <span class="absolute bottom-8">organizer : <strong class="text-orange-500 ">{{$activity->organizer->user->name}} <a href="{{route('ProfilIndex',$activity->organizer->user->id)}}"> ➤ see more</a></strong></span> --}}
            <div class="absolute bottom-8">
                <span>Organizer :</span>
                <strong>{{$activity->organizer->user->name}}</strong>
                <a class="block sm:inline-block text-orange-500" href="{{route('ProfilIndex',$activity->organizer->user->id)}}"> ➤ see more</a>
            </div>
            <strong class="absolute bottom-2 right-[12%] lg:right-[17%]">{{$activity->city}}</strong>
        </div>
    </div>
</section>

