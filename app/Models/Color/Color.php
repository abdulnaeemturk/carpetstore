<?php

namespace App\Models\Color;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'name',       
       ];

       public function getFillables(): Array
       {
           return $this->fillable;
       }  
}
