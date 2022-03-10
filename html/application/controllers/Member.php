<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()  //생성자
	{
		parent::__construct();
		$this->load->model('Board_model');  
		$this->load->library('session');
	}

	public function index()
	{
		echo "회원 프로그램";
	} 

	public function input(){
 		$data['msg'] = $this->input->get("msg");
		$this->load->view('member/input',$data);
	}

	public function insert(){
		$email =  $this->input->post("email"); 
		$password = $this->input->post("password");
		$password = md5($password);
 
		$result = $this->Board_model->member_insert($email,$password);

		if($result == true)
		{
			header("Location: /index.php/member/login");
		}
		else {
			header("Location: /index.php/member/input?msg=중복된 이메일입니다");
		}
	}

	public function login(){
		$data['msg'] = $this->input->get("msg");
		$this->session->sess_destroy(); // 세션 삭제
		$this->load->view("member/login",$data);
	}

	public function update(){

		$_id['_id'] = $this->session->userdata("_id");
		$email['email'] = $this->session->userdata("email");
		$this->load->view('member/update',$_id,$email);

		$old_email = $this->input->post("old_email"); 
		$new_email = $this->input->post("new_email"); 
		$old_password = $this->input->post("old_password");
		$new_password = $this->input->post("new_password");
		$old_password = md5($old_password);
		$new_password = md5($new_password);

		$_id = $this->input->post("_id");

		$result = $this->Board_model->pwd($old_email,$old_password);

		

		if(isset($result->_id)) {
			$this->Board_model->member_update($new_email,$new_password,$_id);			


		} else {

		}


	}

	public function session()
	{
		$email = $this->input->post("email"); 
		$password = $this->input->post("password");
		$password = md5($password);

		$result = $this->Board_model->login_select($email,$password);

		if(isset($result->_id))
		{
			$newdata = array( 
				'email'     => $email,
				'_id' 		=> $result->_id
			);

			$this->session->set_userdata($newdata);

			

			header("Location: /index.php/board/list");
		}
		else
		{ 
			header("Location: /index.php/member/login?msg=이메일과 비밀번호를 확인해주세요");
		}
	}
}