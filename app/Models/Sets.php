<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sets extends Model
{
    protected $fillable=[
        'name',
        'seriesName',
        'printedTotal',
        'releaseDate'
    ];

    protected $primaryKey=[
        'setId'
    ];
}
