<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTypeModel extends Model
{
    use HasFactory;
    protected $table='item_type';
    protected $primarykey='ItemType_id';
}
