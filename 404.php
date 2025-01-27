<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

    <title>404 - <?=$general['site_title']->value;?></title>

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

	
	<main>
	<div id="error_page">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-7 col-lg-9">
						<h2>404 <i class="icon_error-triangle_alt"></i></h2>
						<p>We're sorry, but the page you were looking for doesn't exist.</p>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /error_page -->
	</main>
	<!--/main-->
    
    
<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>
<?php require_once 'req/body_end.php'; ?>