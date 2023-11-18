<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'sub_category_id';

    public function categoryInfo()
    {
        return $this->belongsTo('App\Models\Backend\Category', 'category_id', 'category_id');
    }
}
