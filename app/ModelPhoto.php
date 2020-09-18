<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPhoto extends Model
{
    protected $table = 'photo';
    protected $fillable = ['image', 'id_post'];

    public function relPostImage(){
        return $this->belongsTo(ModelPost::class, 'id_post');
    }
}
