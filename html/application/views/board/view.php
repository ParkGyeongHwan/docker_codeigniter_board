제목 : <?php echo $result->title; ?> <br />
작성자 : <?php echo $result->name; ?> <br />
내용 : <br />
<?php echo nl2br($result->content); ?>

<br /><br />


<a href="/index.php/board/update?id=<?php echo $result->_id; ?>">글수정</a>
<a href="">글삭제</a>
<a href="/index.php/board">글목록</a>