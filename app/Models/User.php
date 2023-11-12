<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function statusInfo(){
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }
    public function vendorStatusInfo(){
        return $this->belongsTo('App\Models\Status', 'vendor_status_id', 'id');
    }
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User', 'vendor_creator_id', 'id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User', 'vendor_creator_id', 'id');
    }
}
