<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PlayList extends Model
{
    protected $table ='play_lists';

    protected $fillable = [ 
    'judul_playlist',
    'user_id',
    'slug',
    'deskripsi',
    'is_active',
    'gambar_playlist',
    ];
    
  
    protected $hidden = [];
    public function users()
    {
       return $this->belongsTo(User::class,'user_id','id');
    }

}
