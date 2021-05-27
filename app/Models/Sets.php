<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sets extends Model
{
    protected $table = 'Sets';
    protected $primaryKey='setId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

}
