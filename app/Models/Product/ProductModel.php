<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductModel extends Model
{
    use HasFactory, Searchable;
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'product_qty',
        'product_price',
        'product_sate',
    ];
    public function searchableAs()
    {
        return 'product_name';
    }

}
