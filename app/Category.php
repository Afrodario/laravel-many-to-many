<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    //Specifico il tipo di relazione tra tabelle, con il namespace APP e la tabella Post di riferimento
    //creando una funzione pubblica di nome posts
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
