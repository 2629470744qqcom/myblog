<?php
namespace Admin\Controller;
use Common\Controller\BaseController;

class ArticleController extends BaseController {
    /**文章列表*/
    public function index(){
        $info =M('article')->field('*')->where('is_delete=1')->order('id desc')->select();
        foreach($info as $k => $v){
            if(!empty($v["cate_id"])){
                $info[$k]['cname']=M('category')->where('id='.$v['cate_id'])->getField('cate_name');
            }
        }
        foreach($info as $k => $v){
            if(!empty($v["author_id"])){
                $info[$k]['author']=M('author')->where('id='.$v['author_id'].' and status=1')->getField('name');
            }
        }
        $this->assign('info',$info);
        $this->display();
    }

    /**添加文章*/
    public function addtext(){
        if(IS_POST){
            dump($_POST['pic']);
            $_POST['add_time']=time();
            M('article')->add($_POST);
            $this->redirect('index');

        }
        $author = M('author')->field('*')->where('status=1')->select();
        $this->assign('author',$author);
        $category = M('category')->field('*')->select();
        $this->assign('category',$category);
        $this->assign('action_url', U('Article/addtext'));
        $this->display();
    }

    /**编辑文章*/
    public function edittext(){
        if(IS_POST){
            $_POST['add_time']=time();
            M('article')->where('id='.I('post.id',0,'intval'))->save($_POST);
            $this->redirect('index');
        }else{
            $infos  =M('article')->field('*')->where('id='.I('get.id',0,'intval'))->find();
            $author = M('author')->field('*')->where('status=1')->select();
            $this->assign('author',$author);
            $category = M('category')->field('*')->select();
            $this->assign('category',$category);
            $this->assign('infos',$infos);

            $this->assign('action_url', U('Article/edittext'));
            $this->display('addtext');
        }

    }

    /**删除文章*/
    public function deltext(){
        $id=I('get.id',0,'intval');
        M('article')->where('id='.$id)->delete($id);
        $this->redirect('index');
    }

    /*文章作者*/
    public function lists(){
        $list= M('author')->field('name,status')->where('status=1')->order('id desc,status desc')->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function addauthor(){
        if(IS_POST){
            $data['name'] =$_POST['name'];
            $data['status'] =$_POST['status'];
            M('author')->data($data)->add();
            $this->redirect('lists');
        }
        $this->display();
    }

    public function category(){
        $category= M('category')->field('id,cate_name')->where('')->order('id desc')->select();
        $this->assign('category',$category);
        $this->display();
    }

    public function addcate(){
        if(IS_POST){
            $data['cate_name'] =$_POST['cate_name'];
            M('category')->data($data)->add();
            $this->redirect('category');
        }
        $this->display();
    }
}