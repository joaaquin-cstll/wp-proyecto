<?php
/**
 * Template Name: NEWS
 */
get_header();
$barracuda_paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
$barracuda_news  = new WP_Query(array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	'paged'          => $barracuda_paged,
));
get_template_part('parts-top', null, array('title' => 'News'));
?>

			<section class="module">
				<div class="container">
					<?php get_template_part('loop-posts', null, array('query' => $barracuda_news, 'paged' => $barracuda_paged)); ?>
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
