<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'brand_id';

    public function statusInfo(){
        return $this->belongsTo('App\Models\Status', 'brand_status', 'id');
    }
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User', 'brand_creator', 'user_id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User', 'brand_editor', 'user_id');
    }
}
