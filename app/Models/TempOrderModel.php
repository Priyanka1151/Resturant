<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempOrderModel extends Model
{
    use HasFactory;
    protected $table='temp_order';
    protected $primarykey='temp_id';
    protected $fillable = [
        'category_id','category_name','MenuItemid','item_name','quantity','price'
        ];
}
