<?php

namespace App\Models;

use App\Models\People;
use App\Models\Investor;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email', 'password', 'nama_depan', 'nama_belakang', 'nik', 'negara', 'provinsi', 'alamat', 'telepon', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->nama_depan} {$this->nama_belakang}";
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = in_array($value, ['ADMIN', 'USER', 'INVESTOR', 'EVENT ORGANIZER', 'PEOPLE']) ? $value : 'USER';
    }

    public function people()
    {
        return $this->hasOne(People::class, 'user_id');
    }
    public function investor()
    {
        return $this->hasOne(Investor::class, 'user_id');
    }
    // Wishlist yang dimiliki oleh pengguna
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

}

