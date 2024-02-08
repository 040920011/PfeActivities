<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    protected $fillable = [
        'effective',

    ];
    public function user(){
        return $this->morphOne(User::class,'userable');
    }
    public function activities(){
        return $this->hasMany(Activity::class);
    }
    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class, Activity::class);
    }
}
