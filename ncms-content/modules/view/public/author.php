<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<link rel="icon" href="./ncms-content/assets/img/favicon.png">

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
						<a class="nav-link" href="post"><?= $settings["nav_post_text"] ?></a>
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

	<!-- Begin Top Author Page -->
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 col-md-offset-2">
				<div class="mainheading">
					<div class="row post-top-meta authorpage">
						<div class="col-md-10 col-xs-12">
							<h1>Sal</h1>
							<span class="author-description">Founder of <a target="_blank" href="https://www.wowthemes.net">WowThemes.net</a> and creator of <strong>"Mediumish"</strong> theme that you're currently previewing. I professionally develop premium themes, templates & scripts since the Apocalypse (2012). You can reach me out on the social links below.</span>
							<div class="sociallinks"><a target="_blank" href="https://www.facebook.com/wowthemesnet/"><i class="fa fa-facebook"></i></a> <span class="dot"></span> <a target="_blank" href="https://plus.google.com/s/wowthemesnet/top"><i class="fa fa-google-plus"></i></a></div>
							<a target="_blank" href="https://twitter.com/wowthemesnet" class="btn follow">Follow</a>
						</div>
						<div class="col-md-2 col-xs-12">
							<img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Top Author Meta -->

	<!-- Begin Author Posts -->
	<div class="graybg authorpage">
		<div class="container">
			<div class="listrecent listrelated">

				<!-- begin post -->
				<div class="authorpostbox">
					<div class="card">
						<a href="author">
							<img class="img-fluid img-thumb" src="./ncms-content/assets/img/demopic/8.jpg" alt="">
						</a>
						<div class="card-block">
							<h2 class="card-title"><a href="post">Life is worth living forever and ever</a></h2>
							<h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
							<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="author"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a href="author">Sal</a></span><br />
										<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
									</span>
									<span class="post-read-more"><a href="post" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
												<path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
											</svg></a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end post -->

				<!-- begin post -->
				<div class="authorpostbox">
					<div class="card">
						<a href="author">
							<img class="img-fluid img-thumb" src="./ncms-content/assets/img/demopic/10.jpg" alt="">
						</a>
						<div class="card-block">
							<h2 class="card-title"><a href="post">Best European capitals to visit and the costs implied</a></h2>
							<h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
							<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="author"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a href="author">Sal</a></span><br />
										<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
									</span>
									<span class="post-read-more"><a href="post" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
												<path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
											</svg></a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end post -->

				<!-- begin post -->
				<div class="authorpostbox">
					<div class="card">
						<a href="author">
							<img class="img-fluid img-thumb" src="./ncms-content/assets/img/demopic/9.jpg" alt="">
						</a>
						<div class="card-block">
							<h2 class="card-title"><a href="post">10 Things you should learn before visiting</a></h2>
							<h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
							<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="author"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a href="author">Sal</a></span><br />
										<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
									</span>
									<span class="post-read-more"><a href="post" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
												<path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
											</svg></a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end post -->

			</div>
		</div>
	</div>
	<!-- End Author Posts -->

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

	<!-- Bootstrap core JavaScript -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="./ncms-content/assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="./ncms-content/assets/js/bootstrap.min.js"></script>
	<script src="./ncms-content/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>