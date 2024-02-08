@extends('navigation.index')

@section('titre')
    Update Reservation
@endsection
@section('content')
<div class="bg-[#29d9d5] pt-[150px] h-full">
    <section class="relative text-white  w-full  ">
    <div class=" flex flex-col md:flex-row rounded-xl  w-[80%] md:w-[70%] mx-auto text-[#111] bg-white">
        <img class="p-1 rounded-xl h-[300px] w-full lg:w-[50%]  mx-[auto]" src="{{ url("/storage/images/{$reservation->activity->image->url}")}}" alt="image">
        <div class="">
            <form action="" method="POST">
                @csrf
                  <h2 class="text-center">Edit reservation</h2>
                  @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif

                {{-- <h1 class='text-center my-8 mx-4 py-2 md:text-lg rounded-xl text-white bg-black'>{{$activity->title}}</h1> --}}
                {{-- <p>{{$activity->description}}</p> --}}
                <input class="h-[45px] bg-neutral-200 rounded-xl block sm:inline-block my-2 w-[95%] sm:w-[45%] md:w-[90%] mx-[auto] sm:mx-[2.5%]"
                type="date" value="{{$reservation->reservation_time}}" name="day" id="">
                <select class="h-[45px] bg-neutral-200 rounded-xl block sm:inline-block my-2 w-[95%] sm:w-[45%] md:w-[90%]  mx-[auto] sm:mx-[2%]"
                  name = "hour">
                    <option  disabled value = "hour-select">choisir l\'heure</option>
                    <option value="10" {{ $reservation->hour == 10 ? 'selected' : '' }}>10:00</option>
                    <option value="12" {{ $reservation->hour == 12 ? 'selected' : '' }}>12:00</option>
                    <option value="14" {{ $reservation->hour == 14 ? 'selected' : '' }}>14:00</option>
                    <option value="16" {{ $reservation->hour == 16 ? 'selected' : '' }}>16:00</option>
                    <option value="18" {{ $reservation->hour == 18 ? 'selected' : '' }}>18:00</option>
                </select>
                <input class="w-[95%] pl-2 bg-neutral-200 sm:w-[45%] mx-[2.5%] my-2 md:w-[90%]  rounded-xl h-[45px]"
                type = "number" value="{{$reservation->nbrPeople}}" name="nbrPeople" placeholder="Nbr d'personnes?" min = "1" max="10">
                <button type="submit" class="inline-block w-[95%] sm:w-[45%]  mx-[2%] my-2 md:w-[90%]   h-[45px]  text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full md:text-lg px-5 py-2.5 text-center  mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Update</button>

            </form>

            <strong class="block mt-4">{{$reservation->activity->city}}</strong>
        </div>
    </div>
    </section>
</div>

