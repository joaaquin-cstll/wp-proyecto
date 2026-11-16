<?php
/**
 * Cabecera común (preloader + menú + hero) para las plantillas de página.
 * Uso: get_template_part('parts-top', null, array('title' => 'Título', 'subtitle' => 'Texto'));
 */
$barracuda_title    = isset($args['title']) ? $args['title'] : get_the_title();
$barracuda_subtitle = isset($args['subtitle']) ? $args['subtitle'] : '';
$barracuda_img      = get_template_directory_uri() . '/assets/images';
?>
		<!-- Preloader-->
		<div class="page-loader">
			<div class="loader"></div>
		</div>
		<!-- Preloader end-->

		<!-- Header-->
		<header class="header header-transparent">
			<!-- Top bar-->
			<div class="top-bar">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ul class="list-left-align">
								<li>Mon - Fri: 07:00 am - 05:00 pm</li>
								<li><abbr title="Phone">P:</abbr> +39 02 87 21 43 19</li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="top-bar-tools">
								<li><a class="open-offcanvas" href="#"><i class="ti-menu"></i></a></li>
								<li><a href="<?php echo esc_url(home_url('/?s=')); ?>"><i class="ti-search"></i></a></li>
								<li><a href="<?php echo esc_url(admin_url()); ?>"><i class="ti-user"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="navigation navigation-center">
				<div class="container-fluid">
					<!-- Brand-->
					<div class="inner-header"><a class="inner-brand" href="<?php echo esc_url(home_url('/')); ?>"><img class="brand-dark" src="<?php echo esc_url($barracuda_img); ?>/logo.png" width="74px" alt=""><img class="brand-light" src="<?php echo esc_url($barracuda_img); ?>/logo-light.png" width="74px" alt=""></a></div>
					<!-- Navigation-->
					<?php get_template_part('nav'); ?>
				</div>
			</div>
		</header>
		<!-- Header end-->

		<!-- Wrapper-->
		<div class="wrapper">

			<!-- Hero-->
			<section class="module-cover parallax" data-background="<?php echo esc_url($barracuda_img); ?>/module-8.jpg" data-overlay="1" data-gradient="1">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="text-center">
								<h2 class="display-1"><?php echo esc_html($barracuda_title); ?></h2>
								<?php if ($barracuda_subtitle) : ?>
									<p><?php echo esc_html($barracuda_subtitle); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Hero end-->
