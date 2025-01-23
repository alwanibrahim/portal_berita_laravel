<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Meteri extends Model
{
    protected $table ='meteri';
    protected $fillable =['judul_materi','slug','link','deskripsi','playlist_id','is_active','gambar_materi'];
    protected $hidden =[];
    public function playlists(){
        return $this->belongsTo(PlayList::class,'playlist_id','id');
    }
}

