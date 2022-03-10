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
        $id = $this->input->POST('email');
        
        $pw = $this->input->POST('password');


        $this->Board_model->member_insert($id,$pw);


    }
}
