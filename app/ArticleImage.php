<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    public function articulo()
    {
        return $this->belongsTo(Article::class);
    }
}
