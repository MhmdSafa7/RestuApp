<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reservation extends Model
{
    public $timestamps=false;

    // Table name
    public $table='reservations';

    // Primary Key
    public $primaryKey='id';

    use HasFactory;
}
