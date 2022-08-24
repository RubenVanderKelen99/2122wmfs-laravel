<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = ['start_time', 'lat_start', 'lng_start', 'lat_destination', 'lng_destination', 'end_time', 'type', 'user1_id'];

    protected $visible = ['id', 'start_time', 'lat_start', 'lng_start', 'lat_destination', 'lng_destination', 'end_time', 'type', 'user1_id', 'user2_id'];

    protected $casts = ['start_time' => 'datetime:H:i d/m/Y', 'end_time' => 'datetime:H:i d/m/Y'];


    public function firstUser() {
        return $this->belongsTo(User::class, 'user1_id');
    }

    public function secondUser() {
        return $this->belongsTo(User::class, 'user2_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'id');
    }
}
