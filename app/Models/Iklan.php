<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $table = 'iklan';

    protected $fillable = [
        'judul',
        'link',
        'gambar_iklan',
        'status'
    ];

    protected $hidden =[];

}
