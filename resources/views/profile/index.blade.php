@extends('navigation.index')
@section('titre')
    profile
@stop
@section('content')
    <div class="profile flex flex-row " >
        <nav class="bg-[#333] mt-[50px] w-[28%] hidden lg:block ">
            <div class="sticky top-[50px]">
                <div class="user px-2 py-[80px] ">
                    <div class="flex justify-center">
                        <img class="" src="{{ url("/storage/images/{$utilisateur->user->image->url}")}}" alt="image">
                    </div>
                    <h3 class="text-center text-white name">{{$utilisateur->user->firstname .' ' . $utilisateur->user->lastname}}</h3>
                </div>
                <div class="flex flex-col items-center justify-between ">
                    <a class="w-[55%] text-center my-4 p-2 rounded-full shadow-md bg-[#111111] hover:bg-white hover:text-[#29D9D5] text-white font-semibold" href="{{route('PfeIndex')}}">Home</a>
                    <a class="w-[55%] text-center my-4 p-2 rounded-full shadow-md bg-[#111111] hover:bg-white hover:text-[#29D9D5] text-white font-semibold" href="{{route('activities')}}">Activities</a>
                    <a class="w-[55%]  text-center my-4 p-2 rounded-full shadow-md bg-[#111111] hover:bg-white hover:text-[#29D9D5] text-white font-semibold" href="#informations">Informations</a>
                </div>
            </div>
        </nav>
        <div class="lg:w-[72%] w-full">
            <div class="mt-[50px] w-full text-white">
                <h1 class="head_info mt-[100px] text-[2rem] text-center">{{$utilisateur->user->name}} Activities</h1>
                <div class="my-10 text-white mx-[auto] w-[70%]  sm:w-full ">
                    @php($count=0)
                    @if ($activities->isNotEmpty())
                        @foreach ($activities as $activity)
                            @if ($count < 3)
                                <x-activitie :activitie='$activity'/>
                            @endif
                            @php($count++)
                        @endforeach
                    @else
                        <h2 class="text-center ">you dont have any activity</h2>
                    @endif

                </div>
                <button class=" ml-10 mb-10 p-2 rounded-full bg-[#29D9D5] hover:text-[#29D9D5] hover:bg-white"><a class="" href="{{route('Profil_activities',$utilisateur->id)}}">All Activities</a></button>
                @if (auth()->check() && $utilisateur->user->id == auth()->user()->id)
                    <button class=" ml-10 mb-10 p-2 rounded-full bg-[#29D9D5] hover:text-[#29D9D5] hover:bg-white"><a class="" href="{{route('AddActivity')}}">Add Activity</a></button>
                @endif
            </div>
            <div id="informations" class="w-full text-white">
                <h1 class="head_info text-[2rem] text-center">{{$utilisateur->user->name}} Informations</h1>
                <div class="flex flex-col sm:flex-row mt-10">
                    <table class="sm:w-[50%] text-white">
                        <tr class="">
                            <td class="text-[#D1D5DB] px-6 py-6">Nom et Prenom  :</td>
                            <td class="">{{$utilisateur->user->firstname}} {{$utilisateur->lastname}}</td>
                        </tr>
                        <tr>
                            <td class="text-[#D1D5DB] px-6 py-6">Email :</td>
                            <td class="">{{$utilisateur->user->email}}</td>
                        </tr>
                        <tr>
                            <td class="text-[#D1D5DB] px-6 py-6">Phone Number</td>
                            <td class="">{{$utilisateur->user->phone_number}}</td>
                        </tr>
                    </table>
                    <div class="logo sm:w-[44%] flex justify-center">
                        <img class="w-[150px] " src="/storage/images/ActivitésBlack.png" alt="logo">
                    </div>
                </div>
            </div>

        </div>
    </div>



