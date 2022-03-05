<?php
class Board_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        // $this->db 사용 가능
    }

    public function list_select($now_page,$search) {
        if ($now_page == '') {
            $now_page = 0;
        }
    
        $data = $this->db->query('
        select 
            _id,
            title,
            (select email from ci_member where _id = ci_board.member_id) as name 
        from 
            ci_board as ci_board
        where
            status = 0
        and
            title like "%'.$search.'%"
        order by _id desc
        limit '.$now_page.',10
        ;
        ');
        $result = $data->result_array();
        return $result;
    }
    
    public function list_total($search) {
        $data = $this->db->query('
        select
            count(*) as cnt
        from
            ci_board
        where
            status = 0
        and
            title like "%'.$search.'%"
        ;
        ');
    
        return $data->row();
    }
    public function view_select($id) {

        $data = $this->db->query('
        select 
            _id,
            title,
            content,
            (select email from ci_member where _id = ci_board.member_id) as name 
        from 
            ci_board as ci_board
        where
            _id = '.$id.'
        ;
        ');
    
        return $data->row();
        
    }
    public function board_insert($title, $content) {

        // title과 content값을 받아 새로운 게시물을 db에 삽입하는 쿼리문
        $this->db->query('
        INSERT INTO ci_board
            (title, content)
        VALUES
            ("'.$title.'", "'.$content.'")
        ;
        ');
    
    }
    public function board_update($_id, $title, $content) {

        // _id, title, content값을 입력받아 기존의 게시물을 수정하는 쿼리
        $this->db->query("
        UPDATE
            ci_board
        SET
            title = '".$title."',
            content = '".$content."'
        WHERE
            _id = ".$_id."
        ;
        ");
    
    }
    public function board_delete($_id) {

        //_id값을 입력받아 게시물을 삭제하는 쿼리
        // status 컬럼을 1로 업데이트
        $this->db->query("
        UPDATE
            ci_board
        SET
            status = 1
        WHERE
            _id = ".$_id."
        ;
        ");
    
    }
    
}