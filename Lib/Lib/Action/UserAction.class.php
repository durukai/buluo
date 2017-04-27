<?php
class UserAction extends Action{
	public $memberinfo;
	
	public function _initialize(){
		//公共不检测
		if(substr(ACTION_NAME, 0, 7) != 'public_') {
			self::check_member();
		}
	}
	
	public function  getSystemAuthKey(){
		$member_setting = F("_user/setting");
		$auth_key = "123" ;
		if($member_setting['auth_key']) {
			$auth_key = $member_setting['auth_key'];
		}
		return $auth_key ;
	}
	
	/**
	 * 判断用户是否已经登陆
	 */
	final public function check_member() {
		//不需要校验的登录信息
		if(GROUP_NAME == 'User' && MODULE_NAME == 'Center' && in_array(ACTION_NAME, array('getcomm','mark','login','gbshow','qqlogin','logout','usernav','reg','show','forgetpwd','send_newmail','validemail','validecode','valideusername','agreement'))){
			return true ;
		}else{
			$cms_auth = $_COOKIE['auth'];
			if($cms_auth){
				$cms_auth_key = md5($this->getSystemAuthKey().$_SERVER['HTTP_USER_AGENT']);
				list($userid, $password) = explode("\t", sys_auth($cms_auth, 'DECODE', $cms_auth_key));
				
				$rs = D("User.User");
				$where['userid']    = array('eq',$userid);
				$this->memberinfo = $rs->getmember($where);
				
				$memberinfo_detail = $rs->getmemberdetail($where);
				if($memberinfo_detail && is_array($this->memberinfo)) {
					$this->memberinfo = array_merge($this->memberinfo,$memberinfo_detail);
				}
				
				if($this->memberinfo && $this->memberinfo['password'] === $password) {
					if($this->memberinfo['groupid'] == 7) {
						setcookie('auth', '');
						setcookie('_userid', '');
						setcookie('_username', '');
						setcookie('_groupid', '');
						setcookie('_nickname', '');
						
						//设置当前登录待验证账号COOKIE，为重发邮件所用
						setcookie('_userid', cookie_encode($this->memberinfo['userid']));
						setcookie('_username', cookie_encode($this->memberinfo['username']));
						setcookie('email', cookie_encode($this->memberinfo['email']));
						
						$this->showmessage("需要邮箱认证", 'index.php?s=User-Center-reg&t=2');
					}
					
					unset($userid, $password, $cms_auth, $auth_key);
				}else{
					setcookie('auth', '');
					setcookie('_userid', '');
					setcookie('_username', '');
					setcookie('_groupid', '');
					setcookie('_nickname', '');
				}
			}else{
				$forward= isset($_GET['forward']) ?  urlencode($_GET['forward']) : urlencode(get_url());
				$this->showmessage("您的会话已过期，请重新登录。", 'index.php?s=User-Center-login&forward='.$forward);
			}
		}
	}
	
	final public function showmessage($msg, $url_forward = 'goback', $ms = 1250){
		$this->assign("msg",$msg);
		$this->assign("url_forward",$url_forward);
		$this->assign("ms",$ms);
		$this->display('./Public/user/message.html');
		exit;
	}
}
?>