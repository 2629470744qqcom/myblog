<?php
//namespace Admin\Controller;
//use Common\Controller\BaseController;
//
//class TagController extends BaseController{
//    public function tag(){
//        $tag= M('tag')->field('*')->order('id desc,status desc')->select();
//        $this->assign('tag',$tag);
//        $this->display();
//    }
//
//    public function add(){
//        if(IS_POST){
//            M('tag')->add($_POST);
//            $this->redirect('tag');
//        }
//        $this->assign('action_url', U('Tag/add'));
//        $this->display();
//    }
//
//    public function edit(){
//        if(IS_POST){
//            $_POST['status']=I('post.status');
//            $_POST['tag'] =I('post.tag');
//            M('tag')->where('id='.I('post.id',0,'intval'))->save($_POST);
//            $this->redirect('tag');
//        }
//        $infos= M('tag')->field('*')->where('id='.I('get.id',0,'intval'))->find();
//        // dump($infos);die;
//        $this->assign('infos',$infos);
//        $this->assign('action_url', U('Tag/edit'));
//        $this->display('add');
//    }
//
//    public function del(){
//        M('tag')->where('id='.I('get.id',0,'intval'))->delete();
//        $this->redirect('tag');
//    }
//}