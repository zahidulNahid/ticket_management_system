<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_id', 'price', 'time_slot',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}

