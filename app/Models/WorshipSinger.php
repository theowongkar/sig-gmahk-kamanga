<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorshipSinger extends Model
{
    /** @use HasFactory<\Database\Factories\WorshipSingerFactory> */
    use HasFactory;

     protected $fillable = [
        'worship_id',
        'singer_id',
    ];

    public function worship()
    {
        return $this->belongsTo(Worship::class, 'worship_id');
    }

    public function singer()
    {
        return $this->belongsTo(Congregation::class, 'singer_id');
    }
}
