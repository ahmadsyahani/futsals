<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
