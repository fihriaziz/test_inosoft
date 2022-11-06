<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SaleReport extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $fillable = ['user_id', 'vehicle_id', 'sale_id', 'qty'];
}
