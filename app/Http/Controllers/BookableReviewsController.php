<?php

namespace App\Http\Controllers;

use App\Models\Bookable;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewIndexResource;

class BookableReviewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Bookable $bookable)
    {
        
        return response()->json(
            ReviewIndexResource::collection($bookable->reviews()->latest()->get())
        );
    }
}
