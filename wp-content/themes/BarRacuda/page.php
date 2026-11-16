<?php
// Plantilla para páginas normales.
get_header();
if (have_posts()) {
	the_post();
}
get_template_part('parts-top', null, array('title' => get_the_title()));
?>

			<section class="module">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 m-auto">
							<article class="post">
								<div class="post-wrapper">
									<div class="post-content">
										<?php the_content(); ?>
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section>

<?php
get_template_part('parts-bottom');
get_footer();
?>
