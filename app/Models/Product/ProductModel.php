<?php

namespace App\Models\Product;

use App\Models\ProductFavorite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\User;

class ProductModel extends Model
{
    use HasFactory, Searchable;
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_image',
        'product_qty',
        'product_price',
        'product_sate',
    ];
    public function searchableAs(): string
    {
        return 'posts_index';
    }
//    public function favoritedBy()
//    {
//        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id')->withTimestamps();
//    }
//    public function favorites()
//    {
//        return $this->belongsToMany(ProductFavorite::class);
//    }


}
