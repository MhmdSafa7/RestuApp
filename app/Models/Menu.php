<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
