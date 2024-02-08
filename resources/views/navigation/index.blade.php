<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <title>@yield('titre')</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
    AOS.init();
  </script>
</head>
<body class="" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
     <header class="header fixed z-10 top-0 right-0 w-full">
        <div class="head  pb-2">
            <nav class="flex px-2 items-center justify-between flex-wrap  bg-[#222]  text-[#aaa] shadow-lg dark:bg-neutral-600 lg:flex-wrap h-[50px]" data-te-navbar-ref="">
              <div class="flex items-center flex-shrink-0 text-white mr-6">
                  <a class="z-10 " href="{{route('PfeIndex')}}"><img class="inline-block absolute top-3 " src="" alt="image"></a>
              </div>

              {{-- @if(auth()->check() && auth()->user()->userable_type == 'App\Models\Organizer') --}}
                @if(auth()->check())
                    <button onclick="myFunction1()" onblur="setTimeout(myFunctionblur1,400)" ><a  class="fa fa-user fa-lg absolute right-[80px] md:right-[60px] top-[20px] hover:text-neutral-100 " id="login-btn"></a></button>
                    <a id="noti" href="{{route('reservationIndex')}}" class="fa fa-bell fa-lg  absolute  right-[120px] md:right-[90px] top-[20px] hover:text-neutral-100 "></a>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var noti = document.getElementById('noti');
                            var notiBadge = document.getElementById('noti_badge');
                            if (parseInt(notiBadge.innerHTML) > 0) {
                                noti.className = 'fa fa-bell fa-lg absolute right-[120px] md:right-[90px] top-[20px] text-neutral-100 hover:text-[#aaa]';
                            }
                        });
                    </script>
                    @if (request()->route()->getName()!=='reservationIndex')
                        @if (\App\Utils\Helper::isOrganizer())
                        @php
                            $organizer = \App\Models\Organizer::find(auth()->user()->userable_id);
                            $pendingReservationsCount = $organizer->reservations()->where('status', 'pending')->count();
                        @endphp
                        {{-- @dd($pendingReservationsCount) --}}
                        <span id="noti_badge" class="icon-button__badge absolute text-center  right-[112px] md:right-[82px] top-[8px]  z-10 text-white w-[15px] h-[17px] rounded-full">
                            {{$pendingReservationsCount }}
                        </span>
                        @elseif(\App\Utils\Helper::isClient())
                        <span id="noti_badge" class="icon-button__badge absolute text-center  right-[112px] md:right-[82px] top-[8px]  z-10 text-white w-[15px] h-[17px] rounded-full">
                            {{ \App\Models\Reservation::where('client_id',auth()->user()->userable_id)->where('status','pending')->count() }}
                        </span>
                        @endif

                    @endif

                @else
                    <a href="{{route('login')}}" class="fa fa-user fa-lg absolute right-[80px] top-[20px] hover:text-neutral-100 " id="login-btn" ></a>
                @endif
              <div class="block md:hidden">
                <button  onclick="myFunction()" onblur="setTimeout(myFunctionblur,400)" class="absolute right-[30px] top-[16px] hover:text-neutral-100 " type="button"  >
                    <svg class="fill-current h-[24px] w-[22px] " viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
              </div>
              <div id="ProfileOrLogout" class="absolute rounded p-2  right-2 bg-[#aaa] text-white w-[120px] top-[52px] hidden">
                <a class="block p-2 mt-1 rounded bg-black fa fa-user hover:text-[#29d9d5]" href="{{route('ProfilIndex')}}" onclick="handleLinkClick(event)"> Profile</a>
                <a class="block p-2 mt-1 rounded bg-black fa fa-power-off hover:text-[#29d9d5]" href="{{route('logout')}}" onclick="handleLinkClick(event)"> Logout</a>
              </div>
                <div id="menu" class="w-full pl-4 rounded flex-grow bg-[#222] md:ml-8 mt-[50px] md:flex md:items-center md:mt-[-20px] !visible hidden" >
                  <!-- Left links -->
                  @if (request()->route()->getName() === 'PfeIndex')
                        <a class="block md:mt-1 rounded p-2 bg-[#29d9d5]  md:inline-block md:ml-[100px] text-white mr-4">
                            Home
                        </a>
                   @else
                        <a href="{{route('PfeIndex')}}"  class="block md:mt-1  text-[#29d9d5] rounded p-2 hover:bg-[#29d9d5]  md:inline-block md:ml-[100px] hover:text-white mr-4">
                            Home
                        </a>
                  @endif
                  @if (request()->route()->getName() === 'activities')
                    <a class="block mt-1 rounded p-2 bg-[#29d9d5] md:inline-block text-white mr-4">
                        Activities
                    </a>
                  @else
                    <a href="{{route('activities')}}" class="block mt-1 text-[#29d9d5] rounded p-2 hover:bg-[#29d9d5] md:inline-block  hover:text-white mr-4">
                        Activities
                    </a>
                  @endif
                  @if (request()->route()->getName() === 'contactez')
                    <a class="block mt-1 rounded p-2 bg-[#29d9d5] md:inline-block  text-white mr-4">
                        Contact Us
                    </a>
                  @else
                    <a href="{{route('contactez')}}" class="block mt-1 text-[#29d9d5] rounded p-2 hover:bg-[#29d9d5] md:inline-block  hover:text-white mr-4">
                        Contact Us
                    </a>
                  @endif
                  @if (request()->route()->getName() === 'apropos')
                    <a  class="block mt-1 rounded p-2 bg-[#29d9d5] md:inline-block text-white mr-4">
                        About Us
                    </a>
                  @else
                    <a href="{{route('aboutUs')}}" class="block mt-1 text-[#29d9d5] rounded p-2 hover:bg-[#29d9d5] md:inline-block hover:text-white mr-4">
                        About us
                    </a>
                  @endif


                </div>
                <!-- Collapsible wrapper -->
              </div>
            </nav>
          </div>
    </header>

    @yield('content')
</body>
</html>
