<?php


$page_title = "Delete account";

require_once ('includes/header.php');
require_once('includes/database.php');


$user_id = $_GET['id'];


$query_str = "DELETE FROM users WHERE user_id = '" . $user_id . "'";


$result = $conn->query($query_str);


if (!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Selection failed with: ($errno) $errmsg<br/>\n";
  $conn->close();
  exit;
}?>
//confirm delete
<div class="container wrapper">
  <h1 class="text-center text-danger">Your account has been deleted</h1>
</div>

<?php
@session_start();


session_destroy();


setcookie(session_name(), '', time()-3600);


$_SESSION = array();

header( "Refresh:3; url=index.php", true, 303);

$conn->close();

?>
