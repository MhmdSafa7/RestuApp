<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    public $timestamps=false;

    // Table name
    public $table='menu_items';

    // Primary Key
    public $primaryKey='id';

    use HasFactory;
}
