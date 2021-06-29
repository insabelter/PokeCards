<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table = 'Offers';
    protected $keyType = 'int';
    public $timestamps = false;
    protected $primaryKey='offerId';
    protected $fillable=[
        'cardId',
        'description',
        'userId',
        'grade',
        'preis',
        'verhandelbar'
    ];

}
