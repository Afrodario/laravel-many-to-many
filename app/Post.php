<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = ['title', 'content', 'slug', 'category_id'];

   //Specifico il tipo di relazione tra tabelle, con il namespace APP e la tabella Category di riferimento
   //creando una funzione pubblica di nome category
   public function category() {
      return $this->belongsTo('App\Category');
   }

   public function tags() {
      return $this->belongsToMany('App\Tag');
   }

}
