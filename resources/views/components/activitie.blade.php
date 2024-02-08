<div data-aos="fade-up" data-aos-duration = "600"  class=" my-2 p-y px-4  bg-[#333] rounded-md inline-block md:w-[30%] sm:w-[46%] w-[90%]  sm:mx-[1%] ">
    @if (\App\Utils\Helper::isOrganizer() && $activitie->organizer_id == auth()->user()->userable_id)
        <a href="{{route('showActivity',$activitie)}}">
    @else
        <a href="{{route('activity',$activitie)}}">
    @endif
            <h3 class="text-center  text-[#29D9D5] pb-2">{{$activitie->title}}</h3>
            <img src="{{ url("/storage/images/{$activitie->image->url}")}}"
            class="place-content-end hover:scale-125 transform transition duration-y rounded h-[200px] w-[90%] mx-[auto]" >
            <a class="text-[#CCC]  float-right underline hover:decoration-double " href="{{route('showActivity',$activitie)}}">Details </a>
        </a>
</div>
