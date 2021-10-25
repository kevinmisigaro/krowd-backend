<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendant extends Model
{
    use HasFactory;

    public $fillable = [
        'avatar', 'user_id', 'active', 'gender', 'visibility'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

}
