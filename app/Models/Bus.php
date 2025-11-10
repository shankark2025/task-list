<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    //
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'bus_id';
    public $incrementing = false;   // turn off auto-increment
    protected $keyType = 'string';
}
