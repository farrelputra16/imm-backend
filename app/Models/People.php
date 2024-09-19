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
}

