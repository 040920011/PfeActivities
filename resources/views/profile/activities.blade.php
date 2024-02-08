@extends('navigation.index')
@section('titre')
 Activities
@stop
@section('content')
    <div class="profile mt-[50px] w-full text-white ">
        <h1 class="head_info mt-[100px] md:text-[3rem] text-[4rem] text-center">{{$user->name}} Activities</h1>
        <div class="my-10 text-white mx-[auto] w-[70%]  sm:w-full lg:w-[80%]">
            @if ($activities->isNotEmpty())
            @foreach ($activities as $activity)
                    <x-activitie :activitie='$activity'/>
            @endforeach
        @else
            <h2 class="text-center ">you dont have any activity</h2>
        @endif
        </div>
        @if (\App\Utils\Helper::isOrganizer() && $user->user->id == auth()->user()->id)
            <button class=" ml-10 mb-10 p-2 rounded-full bg-[#29D9D5] hover:text-[#29D9D5] hover:bg-white"><a class="" href="{{route('AddActivity')}}">Add Activity</a></button>
        @endif
    </div>
