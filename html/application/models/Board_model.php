<?php
class Board_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        // $this->db 사용 가능
    }

    public function list_select() {
        $data = $this->db->query('
        select 
            _id,
            title,
            (select email from ci_member where _id = ci_board.member_id) as name 
        from 
            ci_board as ci_board
        where
            status = 0
        order by _id desc
        ;
        ');
        $result = $data->result_array();
        return $result;
    }
}