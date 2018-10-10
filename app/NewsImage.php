<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    protected $table = 'news_images';


    protected $fillable = [
        'news_id', 'file_name'
    ];

    public function news()
    {
       return $this->belongsTo('App\News', 'id', 'news_id');
    }

   

}
