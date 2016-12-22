<?php
namespace Common\Controller;
use Think\Controller;
use Think\Model;

/**基类控制器
 * @author Rain
 */
class BaseController extends Controller{
    protected function _initialize(){
        header('Content-type:text/html;charset=utf-8');

    }
}