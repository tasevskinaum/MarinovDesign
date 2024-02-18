<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintenance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'maintenance_tip'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
