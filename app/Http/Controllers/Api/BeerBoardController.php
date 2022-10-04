<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BeerBoard;
use App\Http\Resources\BeerBoardResource;
use App\Http\Requests\BeerBoardRequest;

class BeerBoardController extends Controller
{
    public function index()
    {
        return BeerBoardResource::collection(BeerBoard::all());
    }

    public function destroy(BeerBoard $beer) 
    {
        $beer->delete();

        return response()->noContent();
    }

    public function store(BeerBoardRequest $request)
    {
        $beer = BeerBoard::create($request->validated());

        return new BeerBoardResource($beer);
    }

    public function update(BeerBoardRequest $request, BeerBoard $beer)
    {
        $beer->update($request->validated());

        return new BeerBoardResource($beer);
    }
}