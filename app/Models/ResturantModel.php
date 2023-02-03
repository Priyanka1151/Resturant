<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResturantModel extends Model
{
    use HasFactory;
    protected $table='resturant';
    protected $primarykey='Restutant_Tid';
}
