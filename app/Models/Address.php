<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $gaurded = ['id'];
    protected $fillable = [
        'first_names', 
        'last_name', 
        'email', 
        'street', 
        'city', 
        'country',
        'state',
        'zip'
    ];

    public function booking()
    {
        $this->hasOne(Booking::class);
    }
}
