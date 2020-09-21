<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPost extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'post_date', 'post_time', 'image', 'id_user'];

    public function relUsers(){
        return $this->belongsTo('App\User', 'id', 'id_user');
    }

    public function relPhotos(){
        return $this->hasOne(ModelPhoto::class, 'id_post');
    }
}
