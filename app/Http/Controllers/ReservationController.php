<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;
use App\Models\Admin;
use App\Models\Organizer;
use App\Models\Client;
use App\Models\Category;
use App\Models\Image;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index($filter='all'){
        $users=User::get();

        if ($filter == 'all') {
            if(\App\Utils\Helper::isClient())
            {
                $reservations=Reservation::where('client_id',auth()->user()->userable_id)->orderBy('reservation_time')->get();
            }elseif(\App\Utils\Helper::isOrganizer())
            {
                $organizer=Organizer::where('id',auth()->user()->userable_id)->first();
                $reservations = $organizer->reservations()->with('client')->with('activity')->orderBy('reservation_time')->get();
            }

        }
        elseif($filter == 'pending'){
            if(\App\Utils\Helper::isClient())
            {
                $reservations=Reservation::where('client_id',auth()->user()->userable_id)->where('status','pending')->orderBy('reservation_time')->get();
            }elseif(\App\Utils\Helper::isOrganizer())
            {
                $organizer=Organizer::where('id',auth()->user()->userable_id)->first();
                $reservations = $organizer->reservations()->with('activity')->where('status','pending')->orderBy('reservation_time')->get();

            }
        }elseif($filter == 'accepted'){
            if(\App\Utils\Helper::isClient())
            {
                $reservations=Reservation::where('client_id',auth()->user()->userable_id)->where('status','accepted')->orderBy('reservation_time')->get();
            }elseif(\App\Utils\Helper::isOrganizer())
            {
                $organizer=Organizer::where('id',auth()->user()->userable_id)->first();
                $reservations = $organizer->reservations()->with('activity')->where('status','accepted')->orderBy('reservation_time')->get();
            }
        }elseif($filter == 'refused'){
            if(\App\Utils\Helper::isClient())
            {
                $reservations=Reservation::where('client_id',auth()->user()->userable_id)->where('status','accepted')->orderBy('reservation_time')->get();
            }elseif(\App\Utils\Helper::isOrganizer())
            {
                $organizer=Organizer::where('id',auth()->user()->userable_id)->first();
                $reservations = $organizer->reservations()->with('activity')->where('status','refused')->orderBy('reservation_time')->get();
            }
        }

            return view('reservation.index',['reservations'=>$reservations]);
    }
    public function create(Activity $activity)
    {
        if(\App\Utils\Helper::isOrganizer() && $activity->organizer_id == auth()->user()->userable_id){
            return redirect(route('showActivity',$activity));
        }elseif(\App\Utils\Helper::isOrganizer()){
            return redirect()->back()->withErrors('you cant reserve activities with organizer account');
        }
        return view('reservation.reserve',['activity'=>$activity]);
    }
    public function store(Request $request ,Activity $activity){
        $request->validate([
            'day' => 'required',
            'hour' => 'required',
            'nbrPeople' => 'required',
        ]);
        $data['client_id'] = auth()->user()->userable_id;
        $data['activity_id'] =$activity->id;
        $data['nbrPeople']=$request->nbrPeople;
        $data['reservation_time'] = $request->day;
        $data['hour'] =$request->hour;
        //  dd($data);
        Reservation::create($data);
        return redirect()->route('PfeIndex');
    }
    public function show(Activity $activity)
    {
        $users=User::get();
        $reservations = Reservation::where('activity_id',$activity->id)->where('reservation_time', '>=', now())->orderBy('reservation_time')->get();
        return view('reservation.activity',['activity'=>$activity,'reservations'=>$reservations,'users'=>$users]);
    }
    public function accept(Reservation $reservation)
    {
        // dd($reservation);
        $data['status']='accepted';
        $reservation->update($data);
        return redirect()->back();
    }
    public function refuse(Reservation $reservation)
    {
        // dd($reservation);
        $data['status']='refused';
        $reservation->update($data);
        return redirect()->back();
    }
    public function edit(Reservation $reservation)
    {
        return view('Reservation.edit',['reservation'=>$reservation]);
    }
    public function update(Request $request,Reservation $reservation)
    {
        $request->validate([
            'day' => 'required',
            'hour' => 'required',
            'nbrPeople' => 'required',
        ]);
        $data['client_id'] = auth()->user()->userable_id;
        $data['nbrPeople']=$request->nbrPeople;
        $data['reservation_time'] = $request->day;
        $data['hour'] =$request->hour;
        $reservation->update($data);
        return redirect(route('ProfilIndex'));
    }
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back();
    }



}
