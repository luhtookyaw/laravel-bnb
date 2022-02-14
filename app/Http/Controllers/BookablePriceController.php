<?php

namespace App\Http\Controllers;

use App\Models\Bookable;
use Illuminate\Http\Request;

class BookablePriceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Bookable $bookable)
    {
        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from',
        ]);

        $days = $bookable->priceFor($data['from'], $data['to']);
        $price = $days * $bookable->price;

        return response()->json([
            'total' => $price,
            'breakdown' => [
                $bookable->price => $days,
            ]
        ]);
    }
}
