<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BeerBoard;
use App\Http\Resources\BeerBoardResource;

class BeerBoardController extends Controller
{
    public function index()
    {
        return BeerBoardResource::collection(BeerBoard::all());
    }
}