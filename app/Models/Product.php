<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $primaryKey = 'product_id';


    public function statusInfo(){
        return $this->belongsTo('App\Models\Status', 'brand_status', 'id');
    }
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User', 'brand_creator', 'user_id');
    }

    // public function vendorInfo(){
    //     return $this->belongsTo('App\Models\Product', 'vendor_id', 'user_id');
    // }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User', 'brand_editor', 'user_id');
    }

    public function categoryInfo(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'category_id');
    }
    public function subcategoryInfo(){
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id', 'sub_category_id');
    }
    public function vendorInfo(){
        return $this->belongsTo('App\Models\User', 'vendor_id', 'user_id');
    }
}

