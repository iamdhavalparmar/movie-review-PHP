<?php


require_once ('includes/header.php');
require_once ('includes/database.php');


$query_str = "SELECT * FROM movies";


$result = $conn->query($query_str);


if (!$result) {
	$errno = $conn->errno;
	$errmsg = $conn->error;
	echo "Selection failed with: ($errno) $errmsg<br/>\n";
	$conn->close();
	exit;
}else { 
	?>
	<div class="container wrapper">
		<h1 class="text-center">Movies</h1>
		<div class="movie-list">
			<?php
			$i = 0;
			while ( $result_row = $result->fetch_assoc() ) :
				$i++;
				if ($i == 1) :
					?>
					<div class="row">
				<?php endif; ?>
				<div class="col-xs-4">
					<div class="thumbnail">
						<div class="caption">
							<div class="text-center">
								<a href="moviedetails.php?id=<?php echo $result_row['movie_id']?>">
									<img src="<?php echo $result_row['movie_img'] ?>" />
								</a>
							</div>
							<h3 class="text-center">
								<?php
								echo "<a href='moviedetails.php?id=" . $result_row['movie_id'] . "'>", $result_row['movie_name'], "</a>";
								?>
							</h3>
						</div>
					</div>
				</div>
				<?php if ($i == 3) : ?>
				</div>
				<?php $i=0; endif; endwhile; ?>
		</div>
	</div>
	<?php
	
	$result->close();
}


$conn->close();

