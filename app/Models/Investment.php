<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'investor_id',
        'company_id',
        'amount',
        'investment_date',
        'status'
    ];

    /**
     * Relasi many-to-one dengan Investor
     */
    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }

    /**
     * Relasi many-to-one dengan Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relasi many-to-many dengan FundingRound melalui pivot table funding_round_investment
     */
    public function fundingRounds()
    {
        return $this->belongsToMany(FundingRound::class, 'funding_round_investment')
                    ->withPivot('amount') // Menyimpan jumlah investasi yang sesuai
                    ->withTimestamps();
    }
}
