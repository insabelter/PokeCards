<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    protected $table = 'Prices';
    protected $primaryKey='cardId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
