<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'ride_id', 'user_id'];

    protected $visible = ['content', 'ride_id', 'user_id'];

    public function ride() {
        return $this->belongsTo(Ride::class, 'ride_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
