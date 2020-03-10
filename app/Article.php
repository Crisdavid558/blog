<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Article extends Model
{
    use TraductorFechas;

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ArticleImage::class);
    }

    public function imagenDestacada()
    {
        $imagenDestacada=$this->images->first();
        if(!$imagenDestacada)
            return 'sin_imagen.jpg';
        return $imagenDestacada->nombre;
    }
  
}
