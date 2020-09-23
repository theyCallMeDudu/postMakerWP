<?php

namespace App;

use Corcel\Model\Post as Corcel;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $connection = 'wordpress';
}
