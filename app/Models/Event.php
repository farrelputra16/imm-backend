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
        'allowed_participants',
        'expected_participants',
        'fee_type',
        'organizer_name',
        'email',
        'nomor_tlpn',
        'topic',
        'location',
        'start',
        'event_duration',
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
