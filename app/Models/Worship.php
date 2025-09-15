<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worship extends Model
{
    /** @use HasFactory<\Database\Factories\WorshipFactory> */
    use HasFactory;

    protected $fillable = [
        'preacher_id',
        'mc_id',
        'category',
        'date',
        'start_time',
        'end_time',
        'location',
        'status',
    ];

    public function preacher()
    {
        return $this->belongsTo(Congregation::class, 'preacher_id');
    }

    public function mc()
    {
        return $this->belongsTo(Congregation::class, 'mc_id');
    }

    public function singers()
    {
        return $this->belongsToMany(Congregation::class, 'worship_singers', 'worship_id', 'singer_id');
    }
}
