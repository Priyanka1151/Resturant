<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemModel extends Model
{
    use HasFactory;
    protected $table='mst_menuitem';
    protected $primarykey='MenuItem_Tid';
}
