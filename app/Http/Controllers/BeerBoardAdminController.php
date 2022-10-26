<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeerBoardRequest;
use App\Http\Resources\BeerBoardResource;
use App\Http\Resources\BeerResource;
use App\Models\Beer;
use App\Models\BeerBoard;

class BeerBoardAdminController extends Controller
{
    public function index()
    {
        $beers = BeerBoardResource::collection(BeerBoard::all());

        return inertia('BeerBoard/Index', compact('beers'));
    }

    public function create()
    {
        $beerNames = BeerResource::collection(Beer::all());

        return inertia('BeerBoard/Create', compact('beerNames'));
    }

    public function store(BeerBoardRequest $request)
    {
        $beer = BeerBoard::create($request->validated());

        return redirect()->route('beers.index');
    }

    public function update(BeerBoardRequest $request, BeerBoard $beer)
    {
        $beer->update($request->validated());

        return redirect()->back();
    }

    public function destroy(BeerBoard $beer)
    {
        $beer->delete();

        return redirect()->back();
    }
}