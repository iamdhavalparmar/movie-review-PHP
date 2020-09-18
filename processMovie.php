<?php
//start a new session
session_start();

$page_title = "Add Movie";

require_once 'includes/header.php';
require_once 'includes/database.php';

$title = $_GET['movie_name'];
$year = $_GET['movie_year'];
$bio = $_GET['bio'];
$rating = $_GET['rating'];
$target = "assets/img".basename($_FILES['image']['name']);
$image = $_FILES['image']['name'];



//define sql statement
$query_str = "INSERT INTO movies VALUES (NULL, '$title', '$year', '$rating', '$bio', '$image')";

//execute the query
$result = @$conn->query($query_str);

if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
  echo "FIle uploaded";
}else{
  echo "File not uploaded";
}

//handle error
if(!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Insertion failed with: ($errno) $errmsg<br/>\n";
  $conn->close();
  exit;
}


header("Location: movies.php");