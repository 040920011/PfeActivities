<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Activity;
use App\Models\User;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Organizer;
use Illuminate\Http\Request;
class ActivityController extends Controller
{
    public function index( $organizer=null)
    {
        if($organizer=== null && \App\Utils\Helper::isOrganizer()){
            $organizer=auth()->user()->userable_id;
        }

        $organizer = Organizer::where('id',$organizer)->first();
        $activities =Activity::with('image')->where('organizer_id', $organizer->id)->get();
        return view('profile.activities',['user' =>$organizer,'activities' => $activities]);
    }
    public function create()
    {   $categories =Category::get();
        return view('profile.add',['user'=>auth()->user(),'categories'=>$categories]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'city' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=>'required'
        ]);
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        $activity =Activity::create([
            'title'=>$request->title,
            'city'=>$request->city,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'organizer_id'=>auth()->user()->userable_id,
        ]);
        $activity->image()->create([
            'url'=>$fileName,
        ]);
        return redirect(route('ProfilIndex'));
    }
    public function show(Activity $activity)
    {
        $activitie=Activity::with('image')->where('id', $activity->id)->first();
        $category =Category::where('id', $activity->category_id)->first();
        return view('profile.show',['user'=>auth()->user(),'activity'=>$activitie,'category'=>$category]);
    }
    public function edit(Activity $activity)
    {
        if($activity->organizer_id==auth()->user()->userable_id){
            $categories=Category::get();
            $activitie=Activity::with('image')->where('id', $activity->id)->first();
            $categoryselect =Category::where('id', $activity->category_id)->first();
            return view('profile.edit',['user'=>auth()->user(),'activity'=>$activitie,'categories'=>$categories,'selectedCat'=>$categoryselect]);
        }
        else{
            echo'you cant edit this activity';
        }
    }
    public function update(Request $request, Activity $activity)
    {
        if($activity->organizer_id==auth()->user()->userable_id){
            $request->validate([
                'title' => 'required',
                'city' => 'required',
                'category_id' => 'required|exists:categories,id',
                'description'=>'required'
            ]);
            if ($request->hasFile('image')) {
                Storage::delete('public/images/' . $activity->image->url);
                $activity->image()->delete();
                $fileName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/images', $fileName);
                $activity->image()->create([
                    'url'=>$fileName,
                ]);
            }
            $data['title']=$request->title;
            $data['city']=$request->city;
            $data['category_id']=$request->category_id;
            $data['description']=$request->description;
            $activity->update($data);
            return redirect()->route('Profil_activities');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        Storage::delete('public/images/' . $activity->image->url);
        $activity->image()->delete();
        $activity->delete();
        return redirect()->route('Profil_activities');
    }
}
