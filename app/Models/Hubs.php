<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'number_of_organizations',
        'number_of_people',
        'number_of_events',
        'rank',
        'top_investor_types',
        'top_funding_types',
        'description'
    ];
}
