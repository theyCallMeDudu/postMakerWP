<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPost extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'id_user'];

    public function relUsers(){
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
