<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    //Definisco i metodi per la relazioni manytomany della tabella Post collegata
    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
