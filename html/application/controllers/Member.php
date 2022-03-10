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
		$this->load->view('member/input');
	}

	public function login(){
		echo "로그인";
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
			echo "회원가입이 완료되었습니다.";
		}
		else {
			echo "이미 가입된 이메일 입니다.";

		}
	}
 }

