<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Resources\BookingByReviewShowResource;

class BookingByReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $reviewKey)
    {
        $booking = Booking::findByReviewKey($reviewKey);
        return response()->json(
            $booking ? new BookingByReviewShowResource($booking) : abort(404)
        );
    }
}
