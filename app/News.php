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
        //jika tidak menggunakan eloguent return $this->belongsTo('App\User', 'id', 'user_id');
        return $this->belongsTo(User::class);
    }

    public function newsimages()
    {
        //jika tidak menggunakan eloquent return $this->hasMany('App\NewsImage', 'news_id', 'id');
        return $this->hasMany(NewsImage::class);
    }

}
