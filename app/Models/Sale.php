<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Sale extends Model
{
    protected $connection = "mongodb";
    protected $fillable = ['name', 'stok'];

    use HasFactory;
}
