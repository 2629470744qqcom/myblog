<?php
namespace Admin\Controller;
use Common\Controller\BaseController;

class ArticleController extends BaseController {
    /**文章列表*/
    public function index(){
        $info =M('article')->field('*')->where('is_delete=1')->order('id desc')->select();
        foreach($info as $k => $v){
            $info[$k]['cate_name']=M('category')->where('id='.$v['cate_id'])->getField('cate_name');
        }
        foreach($info as $K => $v){
            $info[$k]['author']=M('author')->where('id='.$v['author_id'])->where('status=1')->getField('author');
        }
        $this->assign('info',$info);
        $this->display();
    }

    /**添加文章*/
    public function addtext(){
        if(IS_POST){
            $_POST['title'] =I('post.title');
            $_POST['add_time'] =time();
            $_POST['is_show'] =I('post.is_show');
            $_POST['author'] =I('post.author');
            $_POST['content'] =I('post.content');
            $_POST['cate_id'] =I('post.cate_id');
            M('article')->add($_POST);
        }
        $author = M('author')->field('*')->where('status=1')->select();
        $this->assign('author',$author);
        $category = M('category')->field('*')->select();
        $this->assign('category',$category);
        $this->display();
    }

    /**编辑文章*/
    public function edittext(){
        $this->display();
    }

    /**删除文章*/
    public function deltext(){
        $this->display();
    }

    /*文章作者*/
    public function lists(){
        $list= M('author')->field('author,status')->where('status=1')->order('id desc,status desc')->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function addauthor(){
        if(IS_POST){
            $data['author'] =$_POST['author'];
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