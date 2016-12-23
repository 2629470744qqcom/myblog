<?php
namespace Share\Controller;
use Common\Controller\BaseController;

/**
 * @author liuma
 */
class LoginController extends BaseController{
	public function _initialize(){
		parent::_initialize();
	}

	/**
	 * 登录页面
	 */
	public function index(){
		if(IS_POST){
			$name = I('post.username', '');
			$pwd  = I('post.password', '');
			$ip   = get_client_ip();

			$info = M('admins')->where('status=1 and name="' . $name . '"')->find();
			if($info['pwd'] === $this->encryptPWD($name, $pwd)){
				$ruleInfo = M('group')->where(array('id' => $info['gid']))->find();

				M('admins')->where('id=' . $info['id'])->save(array('last_login_time' => time(), 'last_login_ip' => $ip));
				M('admin_login_log')->add(array('name' => $name, 'times' => time(), 'ip' => $ip));
				
				switch ($ruleInfo['type']) {
					case 1:
						// 当前是超级管理员， 跳转到超级管理员的页面
						session('super_user', $info);
						session('super_user_rules', $ruleInfo);
						
						$this->returnResult(true, array('登录成功', ''), U('Super/Index/index'));
						break;
					
					case 2:
						// 当前为城市管理员，跳转到城市管理员的页面
						session('city_user', $info);
						session('city_user_rules', $ruleInfo);

						$this->returnResult(true, array('登录成功', ''), U('City/Index/index'));
						break;

					default:
						// 公众号管理人员
						session('aid', $info['id']);
						session('aname', $name);
						session('ainfo', array('name' => $name, 'tel' => $info['tel']));
						$ruleInfo && session('ruleInfo', $ruleInfo);
						session('current_wxaccount_id', $ruleInfo['wx_id']);
						$this->setConfigParams();
						$this->returnResult(true, array('登录成功', ''), U('Admin/Index/index'));
						break;
				}
			}else{
				M('admin_login_log')->add(array('name' => $name, 'times' => time(), 'ip' => $ip, 'status' => 0, 'pwd' => $pwd));
				$this->returnResult(false, array('', '账号或密码错误'));
			}
		}else{
			if(session('aid') > 0){
				$this->redirect($this->getIndexUrl());
			}
			$this->display();
		}
	}

	/**
	 * 退出登录
	 */
	public function logout(){
		session('[destroy]');
		$this->redirect('Share/Login/index');
	}

	/**
	 * 修改密码
	 */
	public function editPwd(){
		$this->setConfigParams();

		if (session('?super_user')) {
			layout('../../Super/View/layout');
		} elseif (session('?city_user')) {
			layout('../../City/View/layout');
		} elseif (session('?aid')) {
			layout('../../Admin/View/layout');
		}

		if(IS_POST){
			$user_id = $this->getCurrentUserId();
			$user_name = $this->getCurrentUserName();

			$pwd = M('admins')->where('id=' . $user_id)->getField('pwd');

			if($this->encryptPWD($user_name, I('post.old_pwd')) === $pwd){
				$data['id']  = $user_id;
				$data['pwd'] = $this->encryptPWD($user_name, I('post.new_pwd'));
				
				$result = $this->updateData($data, 'admins', 2);

				$this->returnResult($result, null, $this->getIndexUrl());
			}
			$this->returnResult(false, array('', '原始密码错误'));
		}else{
			$this->assign('menuList', session('left_menu'));
			$this->display();
		}
	}








	private function getCurrentUserId () {
		if (session('?super_user')) {
			return session('super_user.id');
		} elseif (session('?city_user')) {
			return session("city_user.id");
		} elseif (session('?aid')) {
			return session('aid');
		}
	}

	private function getCurrentUserName () {
		if (session('?super_user')) {
			return session('super_user.name');
		} elseif (session('?city_user')) {
			return session('city_user.name');
		} elseif (session('?aid')) {
			return session('aname');
		}
	}

	/**
	 * 返回当前后台的主页面，用于layout模板中的“返回主页”左侧菜单
	 * @return 
	 */
	private function getIndexUrl() {
		$url = '';

		if (session('?super_user')) {
			$url = U('Super/Index/index');
		} elseif (session('?city_user')) {
			$url = U('City/Index/index');
		} elseif (session('?aid')) {
			$url = U('Admin/Index/index');
		}

		return $url;
	}
}