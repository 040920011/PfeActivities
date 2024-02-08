@extends('navigation.index')

@section('titre')
    reservations
@endsection
@section('content')
    <div class="bg-white  mt-[50px] h-full">
        <h1 class="text-center my-8 pt-8 font-bold">Yours  reservations</h1>
        <div class="ml-2 mb-8">
            <label for="">select </label>
            <select id="showing" onchange="filtering()" class="border border-solid rounded-xl" name="" id="">
                <option  value="">select affichage mode</option>
                <option value="all">All</option>
                <option value="pending">Pending</option>
                <option value="refused">Refused</option>
                <option value="accepted">Accepted</option>
            </select>
            <script>
                window.filtering = function () {
                var select=document.getElementById("showing");
                if (select.value == 'all') {
                    window.location.href="{{route('reservationIndex',['filter'=>'all'])}}";
                }else if (select.value == 'pending') {
                    window.location.href="{{route('reservationIndex',['filter'=>'pending'])}}";
                }else if (select.value == 'accepted') {
                    window.location.href="{{route('reservationIndex',['filter'=>'accepted'])}}";
                }else if (select.value == 'refused') {
                    window.location.href="{{route('reservationIndex',['filter'=>'refused'])}}";
                }
            };
            </script>

        </div>
        @if (\App\Utils\Helper::isClient())
            <table id="reservs" class="w-[95%] mx-auto">
                <tr class="border-1 h-[35px] border-solid">
                    <th class="w-[18%] border border-solid">Activity</th>
                    <th class="border-solid">NbrPeople</th>
                    <th class="border-solid">Email</th>
                    <th class="border-solid">Date</th>
                    <th class="border-solid">Hour</th>
                    <th class="w-[20%] ">Status</th>
                </tr>
                @foreach ($reservations as $reservation)
                    <tr class="text-center border-2  border-solid">
                        <td class="border-solid"><a class="underline" href="{{route('showReservation',$reservation->activity)}}">{{$reservation->activity->title}}</a></td>
                        <td class="border-solid">{{$reservation->nbrPeople}}</td>
                        <td class="border-solid">{{$reservation->activity->organizer->user->email}}</td>
                        <td class="border-solid">{{$reservation->reservation_time}}</td>
                        <td class="border-solid">{{$reservation->hour}}:00</td>
                        @if ($reservation->status->value == 'pending')
                            <td class="flex p-2 text-center justify-center text-white"><a href="{{route('editReservation',$reservation['id'])}}" class="mx-2 p-1 lg:px-3 bg-blue-500 hover:bg-blue-700 rounded-xl" >Update</a>
                                <a href="{{route('dropReservation',$reservation['id'])}}" class="mx-1 p-1 lg:px-3 bg-red-500 hover:bg-red-700 rounded-xl">cancel</a>
                            </td>
                        @elseif($reservation->status->value == 'accepted')
                            <td class="border-solid flex p-2 text-center justify-center text-white"><a class="bg-gray-400 p-1 h-[30px]  rounded-xl px-2 text-white">{{$reservation['status']}}</a>
                                <a href="{{route('dropReservation',$reservation['id'])}}" class="mx-1 p-1 lg:px-3 bg-red-500 hover:bg-red-700 rounded-xl">cancel</a>
                            </td>
                        @else
                            @if ($reservation->status->value == 'pending')
                                <td class="border-solid flex p-2 text-center justify-center text-white"><a href="{{route('editReservation',$reservation['id'])}}" class="mx-2 p-1 lg:px-3 bg-blue-500 hover:bg-blue-700 rounded-xl" >Update</a>
                                    <a href="{{route('dropReservation',$reservation['id'])}}" class="mx-1 p-1 lg:px-3 bg-red-500 hover:bg-red-700 rounded-xl">cancel</a>
                                </td>
                            @else
                                <td class="h-[30px] border-solid"><a class="bg-gray-400 p-1 h-[30px]  rounded-xl px-2 text-white">{{$reservation['status']}}</a></td>
                            @endif
                        @endif

                    </tr>
                @endforeach
            </table>
        @else
        <table id="reservs" class="w-[95%] mx-auto">
            <tr class="border-1 h-[35px] border-solid ">
                <th>ID</th>
                <th class="w-[20%]">Activity</th>
                <th>NbrPeople</th>
                <th>Email</th>
                <th>Date</th>
                <th>Hour</th>
                <th class="w-[20%]">Status</th>
            </tr>
            @foreach ($reservations as $reservation)
                <tr class="text-center border-2  border-solid">
                    <td>{{$reservation->id}}</td>
                    <td><a class="underline" href="{{route('showReservation',$reservation->activity)}}">{{$reservation->activity->title}}</a></td>
                    <td>{{$reservation->nbrPeople}}</td>
                    <td>{{$reservation->client->user->email}}</td>
                    <td>{{$reservation->reservation_time}}</td>
                    <td>{{$reservation->hour}}:00</td>
                    @if ($reservation->status->value == 'pending')
                        <td class="flex p-2 text-center justify-center text-white"><a href="{{route('AcceptReservation',$reservation['id'])}}" class="mx-2 p-1 lg:px-3 bg-blue-500 hover:bg-blue-700 rounded-xl" >Accept</a>
                            <a href="{{route('RefuseReservation',$reservation['id'])}}" class="mx-1 p-1 lg:px-3 bg-red-500 hover:bg-red-700 rounded-xl">Refuse</a>
                        </td>
                    @else
                        <td class="h-[30px] p-2"><a class="bg-gray-400 p-1 h-[30px] rounded-xl px-2 text-white">{{$reservation['status']}}</a></td>
                    @endif

                </tr>
            @endforeach
            </table>
        @endif

    </div>
