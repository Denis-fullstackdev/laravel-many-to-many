<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    // titolo
    // contenuto
    // slug
    protected $fillable = [
        'title',
        'content',
        'slug'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
