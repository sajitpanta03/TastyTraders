<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price', 
        'description', 
        'image', 
        'category_id' 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function discount()
    {
        return $this->hasOne(Discount::class, 'product_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_id');
    }
}
