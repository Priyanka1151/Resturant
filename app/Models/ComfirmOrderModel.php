<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComfirmOrderModel extends Model
{
    use HasFactory;
    protected $table='comfirm_order';
    protected $primarykey='Comorder_Tid';
}
