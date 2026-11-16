<?php
/**
 * Template Name: RECIPES
 */
get_header();
$barracuda_paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
$barracuda_args  = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	'paged'          => $barracuda_paged,
);
// Si existe una categoría "recipes" se filtra por ella; si no, se muestran todas las entradas.
if (term_exists('recipes', 'category')) {
	$barracuda_args['category_name'] = 'recipes';
}
$barracuda_recipes = new WP_Query($barracuda_args);
get_template_part('parts-top', null, array('title' => 'Recipes'));
?>

			<section class="module">
				<div class="container">
					<?php get_template_part('loop-posts', null, array('query' => $barracuda_recipes, 'paged' => $barracuda_paged)); ?>
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
