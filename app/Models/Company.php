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
        'tipe',
        'nama_pic',
        'posisi_pic',
        'telepon',
        'negara',
        'provinsi',
        'kabupaten',
        'jumlah_karyawan',
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
}
