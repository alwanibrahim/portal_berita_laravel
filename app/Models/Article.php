<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = [
        'judul',
        'slug',
        'category_id',
        'user_id',
        'gambar_article',
        'is_active',
        'views',
        'body'
    ];

    protected $hidden =[];
    
    public function categories()
    {
       return $this->belongsTo(Category::class,'category_id','id');
    }
    public function users()
    {
       return $this->belongsTo(User::class,'user_id','id');
    }


}
