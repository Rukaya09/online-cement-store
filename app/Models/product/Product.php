<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'image',
        'exp_date',
        'price',
        'category_id',
    ];
}
