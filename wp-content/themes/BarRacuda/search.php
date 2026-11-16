<?php 
get_header(); 

     $result_number = $wp_the_query->found_posts;

     if ( isset($_GET['s']) && !empty($_GET['s']) ) {
        $search_words = esc_html(get_search_query());
     } else {
        $search_words = 'All Posts';
     }

	 $posts_text = ($result_number === 1) ? 'post found' : 'posts found';
?>

		<!-- Preloader-->
		<div class="page-loader">
			<div class="loader"></div>
		</div>
		<!-- Preloader end-->

		<!-- Header-->
		<header class="header">
			<!-- Top bar-->
			<div class="top-bar">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ul class="list-left-align">
								<li>Mon - Fri: 07:00 am - 05:00 pm</li>
								<li><abbr title="Phone">P:</abbr> +39 02 87 21 43 19</li>
								<li><a href="start.html" data-color="#e1be64">Demos</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="top-bar-tools">
								<li><a class="open-offcanvas" href="#"><i class="ti-menu"></i></a></li>
								<li><a href="sign-in.html"><i class="ti-search"></i></a></li>
								<li><a href="sign-in.html"><i class="ti-user"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="navigation navigation-center">
				<div class="container-fluid">
					<!-- Brand-->
					<div class="inner-header"><a class="inner-brand" href="index.html"><img class="brand-dark" src="assets/images/logo.png" width="74px" alt=""><img class="brand-light" src="assets/images/logo-light.png" width="74px" alt=""></a></div>
					<!-- Navigation-->
					<?php get_template_part('nav'); ?>
				</div>
			</div>
		</header>
		<!-- Header end-->

		<!-- Wrapper-->
		<div class="wrapper">

			<!-- Brunch-->
			<section class="module parallax" data-background="<?php echo get_template_directory_uri(); ?>/assets/images/module-3.jpg" data-overlay="0.7">
				<div class="container">
					<div class="row">
						<div class="col-md-6 m-auto">
							<div class="text-center">
								<h1 class="display-1">Results for: <?php echo $search_words; ?></h1>
								<p class="lead"><?php echo $result_number; ?> posts found </p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Brunch End-->

			<!-- Brunch Menu-->
			<section class="module">
				<div class="container">
					<div class="row">
						<div class="col-md-8 m-auto">
							<div class="menu-simple">

                            <?php 
                                if(have_posts()):
                                    while(have_posts()):
                                        the_post();
                            ?>







								<div class="menu-simple-item">
									<div class="menu-simple-item-img"><img src="assets/images/widgets/1.jpg" alt=""></div>
									<div class="menu-simple-item-inner">
										<h6><span><?php the_title(); ?></span><span class="pull-right">Status</span></h6>
										<p><?php the_category(' & '); ?></p>
									</div>
								</div>



                                <?php 
                                    endwhile;
                                endif;
                                ?>







						
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Brunch Menu End-->


			<svg class="footer-circle" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewbox="0 0 100 100" preserveaspectratio="none">
				<path d="M0 100 C40 0 60 0 100 100 Z"></path>
			</svg>
			<!-- Footer-->
	<?php get_footer();