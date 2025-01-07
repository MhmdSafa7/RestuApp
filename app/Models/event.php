<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
     // Table name
     public $table='events';

     // Primary Key
     public $primaryKey='id';

     // Time
     public $timestamps=false;
     use HasFactory;
}
