<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'topic',
        'location',
        'start',
        'end',
        'deadline',
        'cover_img',
        'hero_img',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function hubs()
    {
        return $this->belongsToMany(Hubs::class, 'event_hubs', 'event_id', 'hub_id');
    }

}
