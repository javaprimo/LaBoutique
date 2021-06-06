<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<title>Gestion de boutique e-Shop</title>
</head>

<body>
	<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);// ^ E_WARNING);

	?>
	<div class="container">
		<div class="row justify-content-md-center">
			<table>
				<tr>

					<?php
					require("header.php");
					require("notifications.php");
					?>
				</tr>
				<tr>
					<p>
						<?php

						if (!isset($_SESSION['SESSION_ID'])) {
							header('location: ../index.php?page=login');
							exit();
						} else if (isset($_GET['page'])) {
							$page = $_GET['page'];
							require($page . ".php");
						} else {
							require("connexion.php");
						}
						?>
					</p>
				</tr>
				<tr>
					<?php require("footer.php"); ?>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>