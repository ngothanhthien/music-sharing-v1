<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class User extends Model
{
    use HasFactory,HasApiTokens;
    public $timestamps = false;
    protected $fillable=['google_id','nickname'];
}
