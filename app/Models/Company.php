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
    // Relationship with People through Team
    public function teamMembers()
    {
        return $this->belongsToMany(People::class, 'team')->withPivot('role');
    }
}
