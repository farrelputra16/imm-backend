<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'profile',
        'founded_date',
        'tipe',
        'nama_pic',
        'posisi_pic',
        'telepon',
        'negara',
        'provinsi',
        'kabupaten',
        'jumlah_karyawan',
        'startup_summary',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function incomes()
    {
        return $this->hasMany(CompanyIncome::class);
    }
    // Relasi many-to-many dengan People melalui tabel team
    public function teamMembers()
    {
        return $this->belongsToMany(People::class, 'team')->withPivot('position')->withTimestamps();
    }
    // Hubungan many-to-many dengan Hubs
    public function hubs()
    {
        return $this->belongsToMany(Hubs::class, 'company_hub', 'company_id', 'hub_id');
    }
    // Hubungan dengan Project
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function fundingRounds()
    {
        return $this->hasMany(FundingRound::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
