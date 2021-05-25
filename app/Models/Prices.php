<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    protected $fillable=[
        'normal',
        'holofoil',
        'reverseHolofoil',
        'firstEditionHolofoil',
        'buyURL'
    ];
    protected $primaryKey=[
        'cardId'
    ];
}
