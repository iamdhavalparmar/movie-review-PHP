<?php

session_start();

$page_title = "Register New Account";

require_once 'includes/header.php';
require_once 'includes/database.php';

$user_name = $_GET['username'];
$full_name = $_GET['name'];
$user_email = $_GET['email'];
$password = $_GET['password'];
$role = 2;


$query_str = "SELECT * FROM users WHERE user_name='$user_name' && user_password='$password'";




$result = @$conn->query($query_str);


if(!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Insertion failed with: ($errno) $errmsg<br/>\n";
  $conn->close();
  exit;
}

if($result -> num_rows == 0) {
  
  $query_stry = "INSERT INTO users VALUES (NULL, '$user_name', '$full_name', '$user_email', '$password', '$role')";
  
  $insert_result = @$conn->query($query_stry);

  $new_result = @$conn->query($query_str);
  
  $_SESSION['login'] = $user_name;
  $result_row = $new_result->fetch_assoc();
  $_SESSION['role'] = $role;
  $_SESSION['name'] = $full_name;
  $_SESSION['id'] = $result_row['user_id'];

  $login_status = 3;
  header( "Refresh:3; url=useraccount.php", true, 303);
  ?>
  <div class="container wrapper">
    <h1 class="text-center text-success">You have successfully registered!</h1>
  </div>
<?php } else { ?>
  <div class="container wrapper">
    <h1 class="text-center text-danger">This username is already registered!</h1>
  </div>

<?php
  header( "Refresh:3; url=registration.php", true, 303);
}
