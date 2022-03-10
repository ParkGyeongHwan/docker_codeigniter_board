<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Board_model');
    }

	public function index()
	{
		echo "회원 프로그램";
	} 

	public function input(){
		$data['msg'] = $this->input->get("msg");
	   $this->load->view('member/input',$data);
   }

	public function login(){
		$data['msg'] = $this->input->get("msg");
		$this->load->view('member/login',$data);
	}

	public function update(){
		echo "회원정보수정";
	}

  

    public function insert(){
		$email =  $this->input->post("email"); 
		$password = $this->input->post("password");
		$password = md5($password);
 
		$result = $this->Board_model->member_insert($email,$password);

		if($result == true)
		{
			header("Location: http://127.0.0.1:9001/index.php/member/login");
		}
		else 
		{
			header("Location: /index.php/member/input?msg=중복된 이메일입니다");
		}
	}
	public function session() {

		$email =  $this->input->post("email"); 
		$password = $this->input->post("password");
		$password = md5($password);

		$result = $this->Board_model->member_login($email,$password);

		if($result == '') {
			header("Location: /index.php/member/login?msg=이메일과 비밀번호를 확인해주세요");
		} else {
			echo '로그인 성공';
		}

	}
	
 }

