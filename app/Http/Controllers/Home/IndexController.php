<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller{
    
    
    public function index(){
        $Website = Db::table('admin_config')->first();
        //文章列表
        $list = Db::table('home_article')->orderBy('id', 'desc')->paginate(10);
        //导航
        $nav = Db::table('home_navigation')->get();
        
        return view('home.index',['list'=>$list,'nav'=>$nav,'Website'=>$Website]);
    }
    
    public function lists($id){
        $Website = Db::table('admin_config')->first();
        if($id == ''){
            echo "链接地址错误！";
        }
        //导航
        $nav = Db::table('home_navigation')->get();
        
        $list = Db::table('home_article')->where('id',$id)->paginate(10);
        
        return view('home.list',['list'=>$list,'nav'=>$nav,'Website'=>$Website]);
    }
    
    public function content($id){
        $Website = Db::table('admin_config')->first();
        if($id == ''){
            echo "链接地址错误！";
        }
        
        $info = Db::table('home_article')->where('id',$id)->first();
        
        return view('home.content',['info'=>$info,'Website'=>$Website]);
    }
}