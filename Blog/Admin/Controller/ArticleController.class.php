<?php
namespace Admin\Controller;
use Common\Controller\BaseController;

class ArticleController extends BaseController {
    /**文章列表*/
    public function index(){

        $this->display();
    }

    /**添加文章*/
    public function addtext(){

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
    
}