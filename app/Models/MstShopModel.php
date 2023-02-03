<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstShopModel extends Model
{
    use HasFactory;
    Protected $table='master_shop';
    Protected $primarykey='shop_Tid';
}
