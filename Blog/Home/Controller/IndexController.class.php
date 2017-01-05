<?php
namespace Home\Controller;
use Common\Controller\BaseController;

class IndexController extends BaseController {
    public function index(){
        $where = 'a.is_show=1 and a.is_delete=1 and u.status=1';
        $where .= ' and a.author_id=u.id';
        $where .= ' and a.cate_id=c.id';
        $list =M()->table('rain_article as a,rain_category as c,rain_author as u')->field('a.pic,a.hit,a.add_time,a.title,a.content,u.name as uname,c.cate_name as cname')->where($where)->order('a.add_time desc')->select();

        //dump($list);die;
        $this->assign('list',$list);

        $category =M('category')->field('*')->select();
        $this->assign('category',$category);
        //dump($category);die;
        $this->display();
    }

    public function article(){

        $this->display();
    }
}