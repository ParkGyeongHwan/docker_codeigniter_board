<?php

class Form extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Board_model');
    }

    public function index() {
    }

    public function board_insert() {

        // post방식으로 전달된 title, content값 받아오기
        $title = $this->input->post('title');
        $content = $this->input->post('content');

        // 모델에 title, content값을 전달하며 쿼리 수행
        $this->Board_model->board_insert($title, $content);

        // 쿼리 수행하고 나서 list페이지로 이동
        header("Location: http://127.0.0.1:9001/index.php/board/list");
    }

    

  
}

?>