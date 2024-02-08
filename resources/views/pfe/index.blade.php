@extends('navigation.index')
@section('titre')
    pfe
@stop
@section('content')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
  </script>
  <div class="pfe">
    <section class="home" id="home">
        <div class="content">
            <span  data-aos="fade-up" data-aos-duration = "400">Activities</span>
            <h3 class="font-bold"  data-aos="fade-up" data-aos-delay="300">
                For better travel</h3>
        </div>
    </section>
    <section class="about mb-4 lg:max-h-[325px] text-white flex flex-col md:flex-row w-[80%] md:w-[90%] lg:w-[80%] m-[auto]" id="about">

        <div class=" video-container md:mr-3 md:w-[60%] lg:w-[50%]" data-aos="fade-right" data-aos-delay="300">
            <video src="{{ url("/storage/images/about-vid-1.mp4")}}" muted autoplay loop class="video rounded-xl"></video>
            <div class="controls text-center">
                <span class="control-btn" data-src="images/about-vid-1.mp4"></span>
                <span class="control-btn" data-src="images/about-vid-2.mp4"></span>
                <span class="control-btn" data-src="images/about-vid-3.mp4"></span>
            </div>
        </div>

        <div class="content md:w-[60%]" data-aos="fade-left" data-aos-delay="400">
            <span class="text-[#29d9d5] lg:text-xl lg:my-4">Why us?</span>
            <h3 class="text-2xl font-bold my-4 md:my-2">Activities for better trips</h3>
            <p class="my-4 lg:text-lg">PfeActivities is a website that allows you to book the activity you want.</p>
            <a href="{{route('aboutUs')}}" class="my-4 border-1 border-solid text-lg rounded-full p-2 px-4 hover:bg-black hover:text-white bg-[#29d9d5] text-black">Read more</a>
        </div>

    </section>
    <section>
        @foreach ($categories as $category)
            <h1 class="text-white head_info mt-[50px] md:text-[3rem] text-[2rem] text-center">{{$category->title}} Activities</h1>
            <div class="my-10 text-white mx-[auto] w-[70%]  sm:w-full lg:w-[80%]">
            @foreach ($activities as $activity)
            @if ($category->id == $activity->category_id)
                <x-activitie :activitie='$activity'/>
            @endif
            @endforeach
            </div>
        @endforeach
    </section>
    <section>
        <h1 class="text-white head_info mt-[50px] md:text-[3rem] text-[2rem] text-center"> the more effectivs profiles</h1>
        <div class="my-10 text-white mx-[auto] w-[70%]  sm:w-full lg:w-[80%]">
            @foreach ($organizers as $organizer)
            <div data-aos="fade-up" data-aos-duration = "600"  class="mx-5 my-8 p-1 px-4  bg-[#333] rounded-md inline-block md:w-[30%] sm:w-[46%] w-[90%] sm:mx-[1%]">
                <a href="{{route('ProfilIndex',$organizer->user->id)}}">
                    <h3 class="text-center text-[#29D9D5] pb-2">{{$organizer->user->name}}</h3>
                    <img src="{{ url("/storage/images/{$organizer->user->image->url}")}}" class="place-content-end hover:scale-125 transform transition duration-y  rounded h-[200px] w-[90%] mx-[auto]" >
                    <p class=" h-[25px] md:max-h-[25px]">{{$organizer->user->email}} </p>
                    <a class="text-[#CCC]  float-right underline hover:decoration-double " href="">Details </a>
                </a>
            </div>
        @endforeach
        </div>
    </section>
  </div>


@stop
