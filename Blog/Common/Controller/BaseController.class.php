<?php
 namespace Common\Controller;
 use Think\Controller;
 use Think\Model;

 class BaseController extends Controller{
     protected function _initialize(){
         //定义字符集
         header("Content-type:text/html ; charset=utf-8");
         //定义所有样式
         define('CSS','/Public/'.MODULE_NAME.'/css/');
         define('JS','/Public/'.MODULE_NAME.'/js/');
         define('IMG','/Public/'.MODULE_NAME.'/images/');
         define('LUI','/Public/'.MODULE_NAME.'/layui/');
         define('JQ', 'http://apps.bdimg.com/libs/jquery/1.8.2/jquery.min.js');

     }

 }