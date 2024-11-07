<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    // Define the table if it's not following the plural naming convention
    protected $table = 'inventories'; 

    // Specify which columns are mass assignable
    protected $fillable = [
        'product_name',  // Name field from the form
        'category',
        'quantity',
        'price',
    ];

    // If you're using timestamps, Laravel will automatically handle 'created_at' and 'updated_at' for you.
    public $timestamps = true;
}
