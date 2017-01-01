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
        $this->display();
    }

    public function addauthor(){
        $this->display();
    }
    
}