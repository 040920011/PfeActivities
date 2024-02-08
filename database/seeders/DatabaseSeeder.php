<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Activity;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Organizer;
use App\Models\Reservation;

use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
                // User::create([
                //     'name'=>'test1',
                //     'email' => 'samih@email.com',
                //     'password'=>Hash::make('secrets'),
                //     'firstname'=>'name1',
                //     'lastname'=>'lastname1',
                //     'phone_number'=>'0633957680',
                // ])->image()->create([
                //     'url'=>'user1.png',
                // ]);
                // User::create([
                //     'name'=>'test2',
                //     'email' => 'samih1@email.com',
                //     'password'=>Hash::make('secrets'),
                //     'firstname'=>'name2',
                //     'lastname'=>'lastname2',
                //     'phone_number'=>'0633957680',
                // ])->image()->create([
                //          'url'=>'user2.png',
                // ]);
                // $category = Category::create([
                //     'title'=>'categorie1',
                //     'description'=>'test1_description',

                //     ]);
                // $category = Category::create([
                //     'title'=>'categorie2',
                //     'description'=>'test2_description',

                // ]);

                // Admin::create([
                //     'role'=>'adminstrator',
                // ]) ->user()->create([
                //     'name'=>'admin',
                //     'email' => 'admin@email.com',
                //     'password'=>Hash::make('secrets'),
                //     'firstname'=>'admin',
                //     'lastname'=>'1',
                //     'phone_number'=>'0633957680',
                // ])->image()->create([
                //          'url'=>'user1.png',
                // ]);
                // Organizer::create([
                //     'effective'=>true,
                // ]) ->user()->create([
                //     'name'=>'organizer',
                //     'email' => 'organizer@email.com',
                //     'password'=>Hash::make('secrets'),
                //     'firstname'=>'organizer',
                //     'lastname'=>'1',
                //     'phone_number'=>'0633957680',
                // ])->image()->create([
                //          'url'=>'user2.png',
                // ]);
                // Organizer::create([
                //     'effective'=>true,
                // ]) ->user()->create([
                //     'name'=>'organizer2',
                //     'email' => 'organizer2@email.com',
                //     'password'=>Hash::make('secrets'),
                //     'firstname'=>'organizer2',
                //     'lastname'=>'1',
                //     'phone_number'=>'0633957680',
                // ])->image()->create([
                //          'url'=>'organizer2.png',
                // ]);
                // Client::create([
                //     'effective'=>true,
                // ]) ->user()->create([
                //     'name'=>'client',
                //     'email' => 'client1@email.com',
                //     'password'=>Hash::make('secrets'),
                //     'firstname'=>'client',
                //     'lastname'=>'1',
                //     'phone_number'=>'0633957680',
                // ])->image()->create([
                //          'url'=>'user3.png',
                // ]);
                // $category = Category::create([
                //     'title'=>'categorie1',
                //     'description'=>'test1_description',

                // ]);
                // $category = Category::create([
                //     'title'=>'categorie2',
                //     'description'=>'test2_description',

                // ]);
                // $activitie = Activity::create([
                //     'title'=>'activity1',
                //     'description'=>'description1',
                //     'city'=>'fes',
                //     'organizer_id'=> 1 ,
                //     'category_id'=> 1 ,
                // ])->image()->create([
                //     'url'=>'imageactivity.png',
                // ]);
                // $activitie = Activity::create([
                //     'title'=>'activity2',
                //     'description'=>'description2  ',
                //     'city'=>'marrakech',
                //     'organizer_id'=> 2 ,
                //     'category_id'=> 1 ,
                // ])->image()->create([
                //     'url'=>'imageactivity2.png',
                // ]);
                // $activitie = Activity::create([
                //     'title'=>'activity3',
                //     'description'=>'description3',
                //     'city'=>'marrakech',
                //     'organizer_id'=> 2 ,
                //     'category_id'=> 2 ,
                // ])->image()->create([
                //     'url'=>'imageactivity3.png',
                // ]);
                // $activitie = Activity::create([
                //     'title'=>'activity4',
                //     'description'=>'description4',
                //     'city'=>'marrakech',
                //     'organizer_id'=> 1 ,
                //     'category_id'=> 2 ,
                // ])->image()->create([
                //     'url'=>'imageactivity4.png',
                // ]);
                $reservation= Reservation::create([
                    'client_id'=> 1 ,
                    'activity_id'=> 1,
                    'nbrPeople' => 2 ,
                    'reservation_time' => '2024-2-6' ,
                    'hour' => 14 ,
                ]);
             


    }
}
