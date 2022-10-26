<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BeerBoard;
use App\Http\Resources\BeerBoardResource;

class BeerBoardController extends Controller
{
    public function index()
    {
        // $beers = BeerBoard::all();
        $beers = BeerBoardResource::collection(BeerBoard::all());

        return inertia('Welcome', compact('beers'));
    }
}