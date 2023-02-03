<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategoryModel extends Model
{
    use HasFactory;
    Protected $table='mster_menucategory';
    Protected $primarykey='Category_Tid';
}
