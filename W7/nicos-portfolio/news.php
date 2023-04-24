<?php include('includes/navdaten.php'); ?>
<?php include('includes/functions.php'); ?>

<?php include('html/header.inc.php'); ?>
	
		<section>
			<div class="container">
				<div class="mt-3">
					<?php if( isset( $_GET['item']) && $_GET['item']>0 ){ ?>
					<h1>Neue Webseite</h1>
					<em>23.09.2022</em>
					<p>Lorem Ipsum....</p>
					<a class="btn btn-light" href="news.php?item=23">&rsaquo;&nbsp;mehr lesen</a>
					<?php }else{ ?>
					<h1>News</h1>
					<div class="container">

						<hr>
						<div class="row">
							<div class="col">
								<h3>Neue Webseite</h3>
								<em>23.09.2022</em>
								<p>Lorem Ipsum....</p>
								<a class="btn btn-light" href="news.php?item=23">&rsaquo;&nbsp;mehr lesen</a>
							</div>
						</div>
						
						<hr>
						<div class="row">
							<div class="col">
								<h3>Neue Webseite</h3>
								<em>23.09.2022</em>
								<p>Lorem Ipsum....</p>
								<a class="btn btn-light" href="news.php?item=23">&rsaquo;&nbsp;mehr lesen</a>
							</div>
						</div>
						
						<hr>
						<div class="row">
							<div class="col">
								<h3>Neue Webseite</h3>
								<em>23.09.2022</em>
								<p>Lorem Ipsum....</p>
								<a class="btn btn-light" href="news.php?item=23">&rsaquo;&nbsp;mehr lesen</a>
							</div>
						</div>
						
					</div>
					<?php } ?>
				</div>
			</div>
		</section>

<?php include('html/footer.inc.php'); ?>