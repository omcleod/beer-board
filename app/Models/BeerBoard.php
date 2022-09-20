<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beer;

class BeerBoard extends Model
{
    use HasFactory;

    public $table = "board";

    protected $fillable = ['beer_id'];

    public function beer() 
    {
        return $this->belongsTo(Beer::class, 'beer_id');
    }
}
