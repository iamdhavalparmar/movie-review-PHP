<?php

$page_title = "Update user details";

require_once ('includes/header.php');
require_once('includes/database.php');


$user_id = $_GET['id'];
$user_name = $_GET['username'];
$full_name = $_GET['name'];
$user_email = $_GET['email'];
$password = $_GET['password'];


$query_str = "UPDATE users SET
    user_name='$user_name',
    user_full_name='$full_name',
    user_email='$user_email',
    user_password='$password'
    WHERE user_id='$user_id'";


$result = @$conn->query($query_str);


if (!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Connection Failed with: $errno, $errmsg<br/>\n";
  exit;
}else {
  ?>
  <?php ?>
  <div class="container wrapper">
    <h2 class="text-center text-success">Your account has been updated</h2>
  </div>


<?php

    
    $query = "SELECT * FROM users WHERE user_name='$user_name' AND user_password='$password'";

    
    $result = @$conn->query($query);
    if($result -> num_rows){
      session_destroy();
    
      session_start();
      $_SESSION['login'] = $user_name;
      $result_row = $result->fetch_assoc();
      $_SESSION['role'] = $result_row['user_role'];
      $_SESSION['name'] = $result_row['user_full_name'];
      $_SESSION['id'] = $result_row['user_id'];
      
      $login_status = 1;
    }

  header( "Refresh:5; url=useraccount.php", true, 303);
}

$conn->close();


