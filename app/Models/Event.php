<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'event_date', 'entrance_fee', 'description', 'club_id', 'alcohol_price', 'active', 'image', 'event_video'
    ];

    public function attendants(){
        return $this->belongsToMany(User::class);
    }
}
