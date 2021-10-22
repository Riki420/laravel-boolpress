<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'image', 'category_id', 'user_id'];
    //Collego le categorie dei post ai post
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    //Recupero con Carbon la data nel formato voluto
    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->column)->format($format);
    }
    //Collego l'autore
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
