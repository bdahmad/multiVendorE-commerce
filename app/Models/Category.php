<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function statusInfo(){
        return $this->belongsTo('App\Models\Status', 'category_status', 'id');
    }
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User', 'category_creator', 'id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User', 'category_editor', 'id');
    }
}
