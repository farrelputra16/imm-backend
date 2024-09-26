<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hubs extends Model
{
    protected $table = 'hubs';

    protected $fillable = [
        'name',
        'provinsi',
        'kota',
        'rank',
        'top_investor_types',
        'top_funding_types',
        'description',
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_hubs', 'hubs_id', 'company_id');
    }

    public function people()
    {
        return $this->belongsToMany(People::class, 'hubs_people', 'hubs_id', 'people_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_hubs', 'hubs_id', 'event_id');
    }
}
