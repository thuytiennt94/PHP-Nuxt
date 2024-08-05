<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $table = 'pizzas';
    protected $fillable = [
        'name',
        "category_id",
        "crust_id",
        "price",
        'topping_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function crust()
    {
        return $this->belongsTo(Crust::class, 'crust_id');
    }
    public function toppings()
    {
        return $this->belongsTo(Topping::class, 'topping_id');
    }
}
