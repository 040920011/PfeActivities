<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusEnum;

class reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'activity_id',
        'nbrPeople',
        'reservation_time',
        'hour',
        'status',
    ];
    protected $casts = [
        'status' => StatusEnum::class,
    ];
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
