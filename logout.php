<?php
session_start();


session_destroy();


setcookie(session_name(), '', time()-3600);


$_SESSION = array();

$page_title = "Log Out";
include('includes/header.php');

?>
<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Log Out</li>
    </ul>
    <h1 class="text-center">Logged Out</h1>
    <p class="lead text-center text-danger"> Thank you for your visit. You are now logged out.</p>
</div>

<?php
header( "Refresh:3; url=index.php", true, 303);
