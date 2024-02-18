<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'display_name'
    ];

    public function types()
    {
        return $this->hasMany(Type::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
