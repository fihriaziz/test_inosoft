<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Vehicle extends Model
{
    protected $connection = "mongodb";
    protected $fillable = ['name', 'year', 'color', 'price', 'stock'];

    use HasFactory;
}
