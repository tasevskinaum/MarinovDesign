<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'dimension',
        'weight',
        'price',
        'discount_percentage',
        'discount_price',
        'category_id',
        'type_id',
        'stock'
    ];

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }

    public function maintenances()
    {
        return $this->belongsToMany(Maintenance::class);
    }

    public function images()
    {
        return $this->hasMany(ProductGallery::class);
    }
}
