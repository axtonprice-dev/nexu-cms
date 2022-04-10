<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<link rel="icon" href="./ncms-storage/configuration/site-logo.png">

	<title><?= $config["site_name"] ?> | <?= $config["site_description"] ?></title>
	<meta name="author" content="<?= $config["site_email"] ?>">
	<meta name="description" content="<?= $config["site_description"] ?>"> <!-- ˜150 chars -->
	<meta property="og:title" content="<?= $config["site_name"] ?>">
	<meta property="og:description" content="<?= $config["site_description"] ?>"> <!-- ˜300 chars -->
	<meta property="og:locale" content="<?= $config["site_language"] ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?= $_SERVER["HTTP_HOST"] ?>">
	<meta property="og:image" content="./ncms-storage/configuration/site-logo.png"> <!-- 200x200px - 1200x1200px -->

	<!-- Bootstrap core CSS -->
	<link href="./ncms-content/assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fonts -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="./ncms-content/assets/css/mediumish.css" rel="stylesheet">
</head>

<body>

	<!-- Begin Nav -->
	<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container">
			<!-- Begin Logo -->
			<a class="navbar-brand" href="./" style="font-family: 'Poppins', sans-serif;">
				<?= $config["site_name"] ?>
			</a>
			<!-- End Logo -->
			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<!-- Begin Menu -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="./"><?= $settings["nav_stories_text"] ?> <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./#posts"><?= $settings["nav_post_text"] ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="author"><?= $settings["nav_author_text"] ?></a>
					</li>
				</ul>
				<!-- End Menu -->
				<!-- Begin Search -->
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="text" placeholder="<?= $settings["nav_searchbar_placeholder"] ?>">
					<span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
							<path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z">
							</path>
						</svg></span>
				</form>
				<!-- End Search -->
			</div>
		</div>
	</nav>
	<!-- End Nav -->

	<!-- Begin Content Container -->
	<div class="container">

		<!-- Begin Site Title -->
		<div class="mainheading">
			<h1 class="posttitle"><?= $settings["index_welcome_header_message"] ?></h1>
			<p class="lead">
				<?= $config["site_description"] ?>
			</p>
		</div>
		<!-- End Site Title -->



		<!-- Begin Footer-->
		<div class="footer">
			<p class="pull-left">
				Copyright &copy; <?= date("Y") ?> <?= $config["site_name"] ?>
			</p>
			<p class="pull-right">
				Contact: <a target="_blank" href="mailto:<?= decryptData($config["site_email"]) ?>"><?= decryptData($config["site_email"]) ?></a>
			</p>
			<div class="clearfix">
			</div>
		</div>
		<!-- End Footer-->

	</div>
	<!-- /.container -->

	<!-- Bootstrap core JavaScript -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="./ncms-content/assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="./ncms-content/assets/js/bootstrap.min.js"></script>
	<script src="./ncms-content/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>