<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    protected $table = 'Cards';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

}
