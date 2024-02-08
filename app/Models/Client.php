<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'effective',

    ];
    public function user(){
        return $this->morphOne(User::class,'userable');
    }
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
