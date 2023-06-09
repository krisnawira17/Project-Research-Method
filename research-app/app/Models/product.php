<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','material', 'quantity', 'price', 'description', 'product_picture'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
