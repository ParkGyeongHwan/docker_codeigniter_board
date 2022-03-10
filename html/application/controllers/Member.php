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
			header("Location: /index.php/member/input?msg=있는 이메일입 니다");
		}
	}

	public function login(){
		$data['msg'] = $this->input->get("msg");
		$this->session->sess_destroy(); // 세션 삭제
		$this->load->view("member/login",$data);
	}

	public function update(){
		echo "회원정보수정";
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