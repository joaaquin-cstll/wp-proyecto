  <?php
    // Aquí tenemos que anexar header.php
    get_header();
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

			<!-- Hero-->
			<section class="module-cover parallax" data-background="<?php echo get_template_directory_uri(); ?>/assets/images/module-8.jpg" data-overlay="1" data-gradient="1">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="text-center">
								<h2 class="display-1">Last Posts</h2>
								<p>See how your users experience your website in realtime or view <br/> trends to see any changes in performance over time.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Hero end-->

			<section class="module">
				<div class="container">
					<div class="row blog-masonry">

					 <?php
                            $args = array(
                                'posts_per_page' => 3,
                            );
                            $last_posts = new WP_Query($args);
                            if($last_posts->have_posts()):
                                while($last_posts->have_posts()):
                                    $last_posts->the_post();

									if (has_post_thumbnail()) {
										$img_url = get_the_post_thumbnail_url();

									} else {
										$img_url = get_template_directory_uri().'/assets/images/com2.PNG';

									}

								
                        ?>




						<div class="col-md-4 post-item">

							<!-- Post-->
							<article class="post">
								<div class="post-preview"><a href="#"><img src="<?php echo $img_url; ?>" alt=""></a></div>
								<div class="post-wrapper">
									<div class="post-header">
										<h2 class="post-title display-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</div>
									<div class="post-content">
										<p><?php the_excerpt(); ?></p>
									</div>
									<div class="post-more"><a href="<?php the_permalink(); ?>">read more...</a></div>
								</div>
							</article>
							<!-- Post end-->
						</div>

						
                        <!--TERMINA EL BUCLE-->
                        <?php
                                endwhile;
                            else:
                                echo "No posts published yet...";
                            endif;
                        
                        ?>





					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="space" data-mY="50px"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="text-center"><a class="btn btn-black" href="#">Load More</a></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="space" data-mY="100px"></div>
						</div>
					</div>
				</div>
			</section>

			<svg class="footer-circle" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewbox="0 0 100 100" preserveaspectratio="none">
				<path d="M0 100 C40 0 60 0 100 100 Z"></path>
			</svg>
			<!-- Footer-->





<?php
    // Aquí tenemos que anexar footer.php
    get_footer();
?>