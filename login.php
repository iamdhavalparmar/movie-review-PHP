<?php


require_once('includes/database.php');

$username = '';
$password = '';
$login_status = 2;

if ( isset($_POST['username']) )
    $username = trim($_POST['username']);
if ( isset($_POST['password']) )
    $password = trim($_POST['password']);

if (!empty($username)) {
    
    $query_stry = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password'";

    
    $result = @$conn->query($query_stry);
    if($result -> num_rows){
        
        session_start();
        $_SESSION['login'] = $username;
        $result_row = $result->fetch_assoc();
        $_SESSION['role'] = $result_row['user_role'];
        $_SESSION['name'] = $result_row['user_full_name'];
        $_SESSION['id'] = $result_row['user_id'];

        
        $login_status = 1;
    }


}
header( "Location: loginform.php?ls=$login_status");
$conn->close();
