<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_forum = "localhost";
$database_forum = "forum";
$username_forum = "root";
$password_forum = "12345678";
$forum = mysql_pconnect($hostname_forum, $username_forum, $password_forum) or trigger_error(mysql_error(),E_USER_ERROR); 
?>