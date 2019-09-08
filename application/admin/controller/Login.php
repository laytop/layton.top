<?php
namespace app\admin\controller;
use think\Controller;

class login extends Controller
{
    //登录
     public function index()
     {
         return $this->fetch();
     }
}