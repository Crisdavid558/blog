<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Theme extends Model
{
    use TraductorFechas;
    use SoftDeletes;
    use SoftCascadeTrait;
    
    protected $dates = ['deleted_at'];
    protected $softCascade = ['articles'];
    protected $fillable=['nombre','destacado','suscripcion'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getEsDestacadoAttribute($valor)
    {
        $esDestacado=$this->destacado;
        if($esDestacado)
        return 'Si';
        return 'No';
    }

    public function getEsSuscripcionAttribute($valor)
    {
        $esSuscripcion=$this->suscripcion;
        if($esSuscripcion)
        return 'Si';
        return 'No';
    }
}
