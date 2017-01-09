<?php
namespace Admin\Controller;
use Common\Controller\BaseController;

class ArticleController extends BaseController {
    /**文章列表*/
    public function index(){
        $where ='is_delete=1';
        $where .= I('get.title') != '' ? ' and title like "%'.I('get.title').'%"' : '';
        $info =M('article')->field('*')->where($where)->order('id desc')->select();
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
            $_POST['pic'] = $this->uploadImg(strval(M('article')->max('id') + 1));
            //dump($_POST['pic']);die;
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
        $list= M('author')->field('id,name,status')->order('id desc,status desc')->select();
        $this->assign('list',$list);
        $this->display();
    }

    /*添加作者*/
    public function addauthor(){
        if(IS_POST){
            $data['name'] =$_POST['name'];
            $data['status'] =$_POST['status'];
            M('author')->data($data)->add();
            $this->redirect('lists');
        }
        $this->assign('action_url',U('Article/addauthor'));
        $this->display();
    }

    /*编辑作者*/
    public function editauthor(){
        if(IS_POST){
            M('author')->where('id='.I('post.id',0,'intval'))->save($_POST);
            $this->redirect('lists');
        }else{
            $ats =M('author')->field('id,status,name')->where('id='.I('get.id',0,'intval'))->find();
            $this->assign('ats',$ats);
            $this->assign('action_url',U('Article/editauthor'));
            $this->display('addauthor');
        }
    }

    /*删除作者*/
    public function delauthor(){
        $id=I('get.id',0,'intval');
        M('author')->where('id='.$id)->delete($id);
        $this->redirect('lists');
    }
    /*文章分类*/
    public function category(){
        $category= M('category')->field('id,cate_name')->where('')->order('id desc')->select();
        $this->assign('category',$category);
        $this->display();
    }

    /*添加文章分类*/
    public function addcate(){
        if(IS_POST){
            $data['cate_name'] =$_POST['cate_name'];
            M('category')->data($data)->add();
            $this->redirect('category');
        }
        $this->assign('action_url',U('Article/addcate'));
        $this->display();
    }

    /*编辑文章分类*/
    public function editcate(){
        if(IS_POST){
            M('category')->where('id='.I('post.id',0,'intval'))->save($_POST);
            $this->redirect('category');
        }else{
            $cg= M('category')->field('*')->where('id='.I('get.id',0,'intval'))->find();
            $this->assign('cg',$cg);
            $this->assign('action_url',U('Article/editcate'));
            $this->display('addcate');
        }
    }

    /*删除分类*/
    public  function delcate(){
        $id=I('get.id',0,'intval');
        M('category')->where('id='.$id)->delete($id);
        $this->redirect('category');
    }

}