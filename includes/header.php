<?php
//start session
@session_start();

//number of items in the shopping cart
$count=0;

//retrieve the cart content
if ( isset ( $_SESSION['cart'] ) ){
	$cart = $_SESSION['cart'];

	if  ( $cart ) {
		$items = explode(',', $cart);
		$count = count($items);
	}
}

//check to see if a user if logged in
$login = '';
$name = '';
$role = 0;

if (isset($_SESSION['login'])){
	$login = $_SESSION['login'];
}

if (isset($_SESSION['name'])) {
	$name = $_SESSION['name'];
}

if (isset($_SESSION['role'])){
	$role = $_SESSION['role'];
}

if (isset($_SESSION['id'])) {
	$session_id = $_SESSION['id'];
}

?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		
			<div id="navbar" class="navbar-collapse collapse">
				<?php
				if ($role == 1) : ?>
					<ul class="nav navbar-nav">
						<li><a href="addtoaccount.php" class="text-capitalize">Welcome, <?php echo $name; ?>!</a></li>
						
						<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="registration.php">Register <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="movies.php">Movies <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="reviews.php">Reviews <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="addmovie.php">Add Movie <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
						</li>
						</ul>

					</div>
					</ul>
				<?php
				endif;
				if ($role == 2) : ?>
					<ul class="nav navbar-nav">
						<li><a href="addtoaccount.php" class="text-capitalize">Welcome, <?php print_r($name); ?>!</a></li>
						
						<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="registration.php">Register <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="movies.php">Movies <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="reviews.php">Reviews <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item active">
							<a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
						</li>
						</ul>

					</div>
					</ul>
				<?php
				endif;
				if (empty($login)) : ?>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="registration.php">Register <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="movies.php">Movies <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="reviews.php">Reviews <span class="sr-only">(current)</span></a>
						</li>
					</div>
					
					
					<form class="navbar-form navbar-right" role="form" action="login.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<button type="submit" class="btn btn-success">SIGN IN</button>
					</form>
					
						
					
				<?php endif; ?>

			</div>
	</div>
	</div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>