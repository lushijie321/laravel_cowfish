<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //文章
    protected $table = 'home_article';

    public static function grid($callback)
    {
        return new Grid(new static, $callback);
    }
    public static function form($callback)
    {
        return new Form(new static, $callback);
    }
}
