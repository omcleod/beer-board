<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use NunoMaduro\Collision\Adapters\Phpunit\Style;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brewery_id', 'style_id', 'abv'];

    public function brewery()
    {
        return $this->belongsTo(Brewery::class, 'brewey_id');
    }

    public function style()
    {
        return $this->belongsTo(Style::class);
    }
}
