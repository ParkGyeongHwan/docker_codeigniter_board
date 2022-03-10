

<form method="post" action="/index.php/member/update">
    이전 이메일 : <input type="text" name="old_email"> <br />
    이전 비밀번호 : <input type="password" name="old_password">
    이메일 : <input type="text" name="new_email"> <br />
    비밀번호 : <input type="password" name="new_password"> <br />
    <input type="submit" value="회원정보수정">
    <input type="text" name="_id" value="<?php echo $_id; ?>">
</form>