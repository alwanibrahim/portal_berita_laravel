<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name_category',
        'slug'
    ];

    protected $hidden =[];
    public function article(){
        return $this->hasMany(Article::class, 'category_id');
    }
}
