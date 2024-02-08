@extends('navigation.index')

@section('titre')
    reservations
@endsection
@section('content')
    <div class="bg-white mt-[50px] h-full">
        <h1 class="text-center my-8 pt-8 font-bold">{{$activity->title}} Reservations</h1>
        <table class="w-[95%] mx-auto">
            <tr class="border-1 h-[35px] border-solid ">
                <th>ID</th>
                <th>NbrPeople</th>
                <th>Email</th>
                <th>Date</th>
                <th>Hour</th>
                <th>Control</th>
            </tr>
            @foreach ($reservations as $reservation)
                <tr class="text-center border-2  border-solid">
                    <td>{{$reservation->id}}</td>
                    <td>{{$reservation->nbrPeople}}</td>
                    @foreach ($users as $user)
                        @if ($reservation->organizer_id == $user->id)
                            <td>{{$user->email}}</td>
                        @endif
                    @endforeach
                    <td>{{$reservation->reservation_time}}</td>
                    <td>{{$reservation->hour}}:00</td>

                    @if ($reservation->status->value == 'pending')
                        <td class="flex p-2 text-center justify-center text-white"><a href="{{route('AcceptReservation',$reservation['id'])}}" class="mx-2 p-1 lg:px-3 bg-blue-500 hover:bg-blue-700 rounded-xl" >Accept</a>
                            <a href="{{route('RefuseReservation',$reservation['id'])}}" class="mx-1 p-1 lg:px-3 bg-red-500 hover:bg-red-700 rounded-xl">Refuse</a>
                        </td>
                    @else
                        <td class="h-[30px]"><a class="bg-gray-400 p-1 h-[30px] rounded-xl px-2 text-white">{{$reservation['status']}}</a></td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
