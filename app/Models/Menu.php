<?php

namespace App\Models;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;

=======

use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps=false;

    // Table name
    public $table='menus';

    // Primary Key
    public $primaryKey='id';

    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class);
    }
}
