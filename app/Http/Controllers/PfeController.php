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
use Illuminate\Support\Facades\Hash;

class PfeController extends Controller
{
    public function login()
    {
        if(auth()->check()){
            return redirect(route('PfeIndex'));
        }
        return view('login.index');
    }

    public function auth()
    {
        validator(request()->all(),[
            'email'=>['required','email'],
            'password'=>['required']
        ])->validate();

        if(auth()->attempt(request()->only(['email','password']))){
            return redirect()->intended(route('PfeIndex'));
        }
        return redirect()->back()->withErrors(['email'=>'your email or password ur is wrong']);
    }
    public function to_register()
    {
        if(auth()->check()){
            return redirect(route('PfeIndex'));
        }
        return view('login.registration');
    }
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'pass' => 'required|string|min:8',
            'cpass' => 'required|string|same:pass',
        ]);
        $client = Client::create();
        $user = $client->user()->create([
            'name' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'password' => Hash::make($request->pass),
        ]);
        $user->image()->create([
            'url' => 'clientProfile.png',
        ]);
        auth()->login($user);
        return redirect(route('PfeIndex'));
    }
    public function logout()
    {
        auth()->logout();
        return redirect(route('login'));
    }
    public function pfe_index()
    {
        $categories=Category::get();
        $users=Organizer::get();
        $activities =Activity::get();
        // dd($categories,$activities);
      return view('pfe.index',['organizers'=>$users,'categories'=>$categories,'activities'=>$activities]);
    }
    public function show_activities(? Request $request)
    {
        $city = $request->city;
        if(isset($city))
        {
            $activitiesCount =Activity::where('city',$city)->count();
            if($activitiesCount == 0)
            {
                return redirect()->back()->withErrors('We dont have any activity in this City');
            }
            else
            {
                $activities =Activity::where('city',$city)->get();
                return view('pfe.activities',['activities'=>$activities]);

            }
        }
        else
        {
            $categories=Category::get();
            $activities =Activity::get();
            return view('pfe.activities',['categories'=>$categories,'activities'=>$activities]);
        }
    }
    public function contactez_nous(){
        return view('pfe.contactez-nous');
    }
    public function about_us(){
        return view('pfe.apropos');
    }
    public function profile_index(?User $user = null)
    {
        //  dd($user->id);
        if ($user === null) {
            if (auth()->check()) {
                $user=auth()->user();
            }
            else
            {
                return redirect(route('PfeIndex'));
            }
        }
        if(userRole() === "client" && $user === auth()->user()){
            $client=Client::find(auth()->user()->userable_id);
            $reservs = Reservation::where('client_id',$user->userable_id)->where('reservation_time','>=', now())->orderBy('reservation_time','asc')->get();
            //  dd($reservs);
            return view('client.profile',['client' =>$client,'reservations'=>$reservs]);
        }elseif(userRole($user) === "organizer" ){
            $organizer = Organizer::find($user->userable_id);
            $activities =$organizer->activities()->get();
            return view('profile.index', ['utilisateur' =>$organizer, 'activities' => $activities]);
        }
        elseif(\App\Utils\Helper::isAdmin($user)){
            dd($user->userable);
        }

    }

    public function show(Activity $activity)
    {
        $activitie=Activity::with('image')->where('id', $activity->id)->first();
        $category =Category::where('id', $activity->category_id)->first();
        return view('pfe.activity',['activity'=>$activity,'category'=>$category]);
    }





}
