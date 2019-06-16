<?php
namespace app\index\controller;
use think\Controller;
use think\Cache;
use think\cache\driver\Redis;

class Debug extends Controller
{
    public function index()
    {
         $a = \app\common\controller\Token::getToken();
         dump($a);
    }

    public function info()
    {
//        phpinfo();

        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        echo "Connection to server sucessfully";
        $redis->set("tutorial-name", "123");
        echo "Stored string in redis:: " . $redis->get("tutorial-name");

//        Cache::store('redis')->set('key1','123456789');
//        Cache::store('redis')->get('key1');
    }

}
