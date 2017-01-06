<?php
namespace Home\Controller;
use Common\Controller\BaseController;

/*博客首页*/
class IndexController extends BaseController {
     //首页
    public function index(){
        $where = 'a.is_show=1 and a.is_delete=1 and u.status=1';
        $where .= ' and a.author_id=u.id';
        $where .= ' and a.cate_id=c.id';
        $list =M()->table('rain_article as a,rain_category as c,rain_author as u')->field('a.cate_id,a.id,a.pic,a.hit,a.add_time,a.title,a.content,u.name as uname,c.cate_name as cname')->where($where)->order('a.add_time desc')->select();
        $this->assign('list',$list);
        $category =M('category')->field('*')->select();
        $this->assign('category',$category);
        $this->display();
    }

    //文章详情页
    public function article(){
        $info = M('article')->field('*')->where('id='.I('get.id',0,'intval'))->find();
        $info['author'] = M('author')->where('status=1 and id='.$info['author_id'])->getField('name');
        $info['category'] = M('category')->where('id='.$info['cate_id'])->getField('cate_name');

        $new_hit =$info['hit'] +1 ;
        M('article')->where('id='.$info['id'])->setField('hit',$new_hit);
        $info['hit'] +=1;
        $this->assign('info',$info);

        $category =M('category')->field('*')->select();
        $this->assign('category',$category);
        $this->display();
    }

    //分类
    public function category(){
        $categorys = M('article')->field('*')->where('cate_id='.I('get.cate_id'))->select();
        foreach($categorys as $k =>$v){
            $categorys[$k]['cate']=M('category')->where('id='.$v['cate_id'])->getField('cate_name');
        }
        foreach($categorys as $k =>$v){
            $categorys[$k]['author']=M('author')->where('id='.$v['author_id'])->getField('name');
        }
        $this->assign('categorys',$categorys);

        $category =M('category')->field('*')->select();
        $this->assign('category',$category);

        $this->display();

    }
}