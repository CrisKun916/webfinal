<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable =[
        'province', 'municipality', 'barangay'
    ];

    public function supplier(){
        return $this->belongsToMany(Supplier::class);
    }
}
