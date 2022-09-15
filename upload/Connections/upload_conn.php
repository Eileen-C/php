<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_upload_conn = "localhost";
$database_upload_conn = "upload";
$username_upload_conn = "root";
$password_upload_conn = "12345678";
$upload_conn = mysql_pconnect($hostname_upload_conn, $username_upload_conn, $password_upload_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>