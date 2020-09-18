<?php
$page_title = "Delete a movie";

require_once ('includes/header.php');
require_once('includes/database.php');


$movie_id = $_GET['id'];


$query_str = "DELETE FROM movies WHERE movie_id = '" . $movie_id . "'";


$result = $conn->query($query_str);


if (!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Selection failed with: ($errno) $errmsg<br/>\n";
  $conn->close();
  exit;
}
?>

<div class="container wrapper">
  <div class="h1 text-danger text-center">Movie has been deleted.</div>
</div>

<?php

$conn->close();
header( "Refresh:3; url=index.php", true, 303);

?>