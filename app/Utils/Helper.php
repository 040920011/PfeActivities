<?php
namespace App\Utils;
use App\Models\Admin;
use App\Models\Organizer;
use App\Models\Client;
use App\Models\User;



class Helper
{
    public static function isAdmin(?User $user = null) :bool
    {
        if($user === null ){
            $user = auth()->user();
        }
        return  $user?->userable_type === Admin::class;
    }
    public static function isOrganizer(?User $user = null) :bool
    {
        if($user === null ){
            $user = auth()->user();
        }
        return  $user?->userable_type === Organizer::class;
    }
    public static function isClient(?User $user = null) :bool
    {
        if($user === null ){
            $user = auth()->user();
        }
        return  $user?->userable_type === Client::class;
    }
}
