<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$dbhost_rcpip = "localhost";
$dbuser_rcpip = "root";
$dbname_rcpip = "rcpip";
$dbpass_rcpip = "root";
$port = 8889;
//$xoxo = mysql_pconnect($dbhost_rcpip, $dbuser_rcpip, $dbpass_rcpip) or trigger_error(mysql_error(),E_USER_ERROR); 

//$connect = mysql_connect($dbhost_rcpip, $dbuser_rcpip, $dbpass_rcpip) or die("Unable to Connect to '$dbhost'");
//mysql_select_db($dbname_rcpip) or die("Could not open the db '$dbname'");



$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $dbhost_rcpip, 
   $dbuser_rcpip, 
   $dbpass_rcpip, 
   $dbname_rcpip,
   $port
);

?>