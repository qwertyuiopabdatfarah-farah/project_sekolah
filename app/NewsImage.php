<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    protected $table = 'news_images';


    protected $fillable = [
       'news_id', 'file_name'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function news()
    {
       return $this->belongsTo(News::class);
       //jika tidak menggunakan eloguent return $this->belongsTo('App\News', 'news_id', 'id');
    }

   

}
