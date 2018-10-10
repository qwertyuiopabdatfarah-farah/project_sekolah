<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'user_id', 'judul', 'isi'
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function newsimages()
    {
        return $this->hasMany('App\NewsImage', 'news_id', 'id');
    }

}
