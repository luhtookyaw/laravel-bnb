<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Booking;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookable extends Model
{
    use HasFactory;

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function availableFor($from, $to): bool
    {
        return 0 == $this->bookings()->betweenDates($from, $to)->count();
    }

    public function priceFor($from, $to)
    {
        return (new Carbon($from))->diffInDays(new Carbon($to)) + 1;
    }
}
