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

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        // Define fields to be indexed
        return [
            'id' => $array['id'],
            'product_name' => $array['product_name'],
            'product_description' => $array['product_description'],
            // Add other searchable fields here
        ];
    }


}
