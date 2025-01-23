<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';
    protected $fillable=['judul_slide','link','gambar_slide','status',];
    protected $hidden=[];
}
