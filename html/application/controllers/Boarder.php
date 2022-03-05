<?php

class Board extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Board_model');
    }

    public function index() {
        $this->list();
    }

    public function list() {
        $this->load->view('board/list');
    }

    public function input() {
        $this->load->view('board/input');
    }

    public function update() {
        $this->load->view('board/update');
    }

    public function view() {
        $this->load->view('board/view');
    }
}

?>