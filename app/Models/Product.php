<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    

    public $timestamps=false;

    // Table name
    public $table='products';

    // Primary Key
    public $primaryKey='id';

    use HasFactory;
}
