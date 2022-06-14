<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller{
    
    //参与人数
    public $user_number = 50;

    public function index(Request $request){
        //库存
        $goods_number = 10;
        if(!empty(Redis::llen('手环'))){
            echo "已经设置了库存";
            exit;
        }
        //初始化缓存
        Redis::command('del',['user_number','success']);
        //将商品存入Redis链表中
        for($i=1;$i<=$goods_number;$i++){
            Redis::lpush('手环',$i);   
        }
        //设置过期时间
        Redis::expire('手环',120);
        
        echo "商品入队列成功，数量：".Redis::llen('手环');
    }
    
    /**
     * 抢购操作
     **/
    public function start()
    {
        //模拟随机登录用户
        $uid = mt_rand(1,99);
        
        // if(Redis::llen('user_number') > $this->user_number){
        //     echo '遗憾，已经被抢光了';
        //     exit;
        // }
        
        $result = Redis::lrange('success',0,20);
        if(in_array($uid,$result)){
            echo "你已经抢过";
            exit;
        }
        //lpop 每次移除一个，全部被移除就没有
        $count = Redis::lpop('手环');
        if(!$count){
            echo "被抢光了";
            exit;
        }
        $msg = '抢到的人为:'.$uid.' 商品为:'.$count;
        Redis::lpush('success',$msg);
        echo "恭喜你抢到了";
    }
    
    /**
     * 显示抢购结果
     * */
    public function result()
    {
        $result = Redis::lrange('success',0,20);
        dd($result);
    }
}