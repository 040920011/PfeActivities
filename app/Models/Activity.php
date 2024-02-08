<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'city',
        'is_available',
        'organizer_id',
        'category_id',
    ];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
