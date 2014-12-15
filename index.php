<!DOCTYPE html>
<html>
	<head>
		<title>Quinton Playlist Tracks</title>
	</head>
	<body>
		<H1>Playlist Tracks</H1>
		<div class="spotify-tracks">
		<?php
			include 'spotify.php';
			echo $tracks;	
		?>
		</div>
	</body>
</html>