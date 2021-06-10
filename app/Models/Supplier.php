<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

     protected $guarded = [ ];
    /*
    protected $fillable =[
        'name', 'description', 'qty_stock', 'price ', 'category_id', 'supplier_id'
    ];
    */
} 
