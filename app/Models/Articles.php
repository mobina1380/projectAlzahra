<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = "articles" ;
    protected $guarded = [] ;

    public $timestamps = false ;

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function comments()
//    {
//
//        return $this->hasMany(Comments::class,"article_id")->where('approve',1);
//    }



}
