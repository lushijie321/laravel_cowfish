<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    //导航
    protected $table = 'home_navigation';

    public static function grid($callback)
    {
        return new Grid(new static, $callback);
    }
    public static function form($callback)
    {
        return new Form(new static, $callback);
    }
}
