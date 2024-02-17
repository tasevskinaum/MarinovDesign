<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image_url',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
