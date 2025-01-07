<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    public $timestamps=false;

    // Table name
    public $table='feedback';

    // Primary Key
    public $primaryKey='id';

use HasFactory;
}
