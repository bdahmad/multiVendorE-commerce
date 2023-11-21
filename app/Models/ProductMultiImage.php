<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMultiImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_multi_image_id';
    protected $guarded = [];
}
