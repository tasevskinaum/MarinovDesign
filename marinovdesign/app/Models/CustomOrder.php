<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


class CustomOrder extends Model

{

    protected $table = 'custom_orders';

    protected $fillable = ['customer_id', 'name', 'email', 'message', 'image', 'link'];

}