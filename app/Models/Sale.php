<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Sale extends Model
{
    protected $connection = "mongodb";
    protected $fillable = ['user_id', 'vehicle_id', 'qty'];

    use HasFactory;

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
