<?php
/**
 * Template Name: ARCHIVES
 */
get_header();
if (have_posts()) {
	the_post();
}
get_template_part('parts-top', null, array('title' => get_the_title()));
?>

			<section class="module">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h5>Por mes</h5>
							<ul>
								<?php wp_get_archives(array('type' => 'monthly')); ?>
							</ul>
						</div>
						<div class="col-md-6">
							<h5>Por categoría</h5>
							<ul>
								<?php wp_list_categories(array('title_li' => '')); ?>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="space" data-mY="100px"></div>
						</div>
					</div>
				</div>
			</section>

<?php
get_template_part('parts-bottom');
get_footer();
?>
