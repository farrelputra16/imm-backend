<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'org_name',
        'number_of_contacts',
        'location',
        'description',
        'departments',
        'investment_stage',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'number_of_contacts' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getNumberOfInvestmentsAttribute()
{
    return $this->investments()->count();
}

public function company()
{
    return $this->belongsTo(Company::class, 'org_name', 'id');
}

public function investments()
{
    return $this->hasMany(Investment::class);
}

}
