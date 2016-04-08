<?php
class PublicAction extends Action{
	public function login(){
		$this->display();
	}
	public function checkName(){
		if($_POST['username'] == 'admin'){
			$this->success('用户名正确~');
		}else{
			$this->error('用户名错误！');
		}
	}
	public function checkLogin(){
		if($_POST['username'] == 'admin'){
			$this->ajaxReturn($_POST['username'],'用户名正确~',1);
			// success 方法返回
			//$this->success('用户名正确~',true);
			// 加载了 Js/Form/CheckForm.js 类库或提交了 ajax=1 隐藏表单元素
			//$this->success('用户名正确~');
		}else{
			$this->ajaxReturn('','用户名错误！',0);
			// error 方法返回
			//$this->error('用户名错误！',true);
			// 加载了 Js/Form/CheckForm.js 类库或提交了 ajax=1 隐藏表单元素
			//$this->error('用户名错误！');
		}
	}
}
?>