<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'role', 'primary_job_title', 'primary_organization', 'location',
        'regions', 'gender', 'linkedin_link', 'description', 'phone_number', 'gmail', 'user_id'
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi many-to-many dengan Company melalui tabel team
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'team')->withPivot('position')->withTimestamps();
    }
    public function hubs()
    {
        return $this->belongsToMany(Hubs::class, 'hubs_people', 'people_id', 'hubs_id');
    }
}

