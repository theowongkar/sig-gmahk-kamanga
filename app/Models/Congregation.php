<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congregation extends Model
{
    /** @use HasFactory<\Database\Factories\CongregationFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'address',
        'position',
        'status',
    ];

    public function worshipsAsPreacher()
    {
        return $this->hasMany(Worship::class, 'preacher_id');
    }

    public function worshipsAsMc()
    {
        return $this->hasMany(Worship::class, 'mc_id');
    }

    public function worshipsAsSinger()
    {
        return $this->belongsToMany(Worship::class, 'worship_singers', 'singer_id', 'worship_id');
    }
}
