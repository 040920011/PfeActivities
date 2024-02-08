@extends('navigation.index')
@section('titre')
    client profile
@stop
@section('content')
    <div class="profile flex flex-row h-full" >
        <nav class="bg-[#333] mt-[50px] w-[28%] hidden lg:block ">
            <div class="sticky top-[50px]">
                <div class="user px-2 py-[80px] ">
                    <div class="flex justify-center">
                        <img class="" src="{{ url("/storage/images/{$client->user->image->url}")}}" alt="image">
                    </div>
                    <h3 class="text-center text-white name">{{$client->user->firstname .' ' . $client->user->lastname}}</h3>
                </div>
                <div class="flex flex-col items-center justify-between ">
                    <a class="w-[55%] text-center my-4 p-2 rounded-full shadow-md bg-[#111111] hover:bg-white hover:text-[#29D9D5] text-white font-semibold" href="">Home</a>
                    <a class="w-[55%] text-center my-4 p-2 rounded-full shadow-md bg-[#111111] hover:bg-white hover:text-[#29D9D5] text-white font-semibold" href="">Activities</a>
                    <a class="w-[55%]  text-center my-4 p-2 rounded-full shadow-md bg-[#111111] hover:bg-white hover:text-[#29D9D5] text-white font-semibold" href="">Informations</a>
                </div>
            </div>
        </nav>
        <div class="lg:w-[72%] w-full">
                <div class="mt-[50px] w-full text-white">
                    <h1 class="head_info mt-[100px] text-[2rem]  text-center">Your's Reservations</h1>
                    <div class="my-10 text-white  w-[70%]  sm:w-full ">
                        @if (count($reservations)!=0)
                            @php($count=0)
                            <table id="reservs" class="w-[95%] mx-auto text-white">
                                <tr class="border-1 h-[35px] border-solid ">
                                    <th class="w-[18%]">Activity</th>
                                    <th>NbrPeople</th>
                                    <th>Organizer Email</th>
                                    <th>Date</th>
                                    <th>Hour</th>
                                    <th class="w-[20%]">Status</th>
                                </tr>
                                @foreach ($reservations as $reservation)
                                    @if ($count < 3)
                                        <tr class="text-center border-2  border-solid">
                                            <td class="p-3"><a class="underline" href="{{route('activity',$reservation->activity)}}">{{$reservation->activity->title}}</a></td>
                                            <td>{{$reservation->nbrPeople}}</td>
                                            <td>{{$reservation->activity->organizer->user->email}}</td>
                                            <td>{{$reservation->reservation_time}}</td>
                                            <td>{{$reservation->hour}}:00</td>
                                            @if ($reservation->status->value == 'pending')
                                                <td class="flex p-2 text-center justify-center text-white"><a href="{{route('editReservation',$reservation['id'])}}" class="mx-2 p-1 lg:px-3 bg-blue-500 hover:bg-blue-700 rounded-xl" >Update</a>
                                                    <a href="{{route('dropReservation',$reservation['id'])}}" class="mx-1 p-1 lg:px-3 bg-red-500 hover:bg-red-700 rounded-xl">cancel</a>
                                                </td>

                                            @else
                                                <td class="h-[30px]"><a class="bg-gray-400 p-1 h-[30px]  rounded-xl px-2 text-white">{{$reservation['status']}}</a></td>
                                            @endif

                                        </tr>
                                    @endif
                                    @php($count++)
                                @endforeach
                            </table>
                            @if (count($reservations) > 3 )
                                <button class=" ml-10 mb-10 p-2 rounded-full bg-[#29D9D5] hover:text-[#29D9D5] hover:bg-white"><a class="" href="{{route('reservationIndex')}}">All Reservations</a></button>
                            @endif
                        @else
                            <div class="text-center my-[100px]">
                                you dont have any reservations in futur
                            </div>
                        @endif

                    </div>
                </div>

            <div class="w-full text-white">
                <h1 class="head_info text-[2rem] text-center">{{$client->user->name}} Informations</h1>
                <div class="flex flex-col sm:flex-row mt-10">
                    <table class="sm:w-[50%] text-white">
                        <tr class="">
                            <td class="text-[#D1D5DB] px-6 py-6">Nom et Prenom  :</td>
                            <td class="">{{$client->user->firstname}} {{$client->lastname}}</td>
                        </tr>
                        <tr>
                            <td class="text-[#D1D5DB] px-6 py-6">Email :</td>
                            <td class="">{{$client->user->email}}</td>
                        </tr>
                        <tr>
                            <td class="text-[#D1D5DB] px-6 py-6">Phone Number</td>
                            <td class="">{{$client->user->phone_number}}</td>
                        </tr>
                    </table>
                    <div class="logo sm:w-[44%] flex justify-center">
                        <img class="w-[150px] " src="/storage/images/ActivitésBlack.png" alt="logo">
                    </div>
                </div>
            </div>

        </div>
    </div>
