<?php
/**
 * Rejilla de entradas con paginación.
 * Uso: get_template_part('loop-posts', null, array('query' => $wp_query_propio, 'paged' => 1));
 * Sin argumentos usa la consulta principal de WordPress.
 */
$barracuda_q     = isset($args['query']) ? $args['query'] : $GLOBALS['wp_query'];
$barracuda_paged = isset($args['paged']) ? (int) $args['paged'] : max(1, (int) get_query_var('paged'));
?>
<div class="row blog-masonry">
<?php if ($barracuda_q->have_posts()) : ?>
	<?php while ($barracuda_q->have_posts()) : $barracuda_q->the_post(); ?>
		<?php
		if (has_post_thumbnail()) {
			$barracuda_thumb = get_the_post_thumbnail_url(null, 'large');
		} else {
			$barracuda_thumb = get_template_directory_uri() . '/assets/images/thumbnail_pordefecto.jpg';
		}
		?>
		<div class="col-md-4 post-item">
			<!-- Post-->
			<article class="post">
				<div class="post-preview"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($barracuda_thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a></div>
				<div class="post-wrapper">
					<div class="post-header">
						<h2 class="post-title display-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</div>
					<div class="post-content">
						<?php the_excerpt(); ?>
					</div>
					<div class="post-more"><a href="<?php the_permalink(); ?>">read more...</a></div>
				</div>
			</article>
			<!-- Post end-->
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<div class="col-md-12 text-center">
		<p>No hay entradas publicadas todavía.</p>
	</div>
<?php endif; ?>
</div>
<?php if ($barracuda_q->max_num_pages > 1) : ?>
	<div class="row">
		<div class="col-md-12 text-center">
			<?php
			echo paginate_links(array(
				'total'   => $barracuda_q->max_num_pages,
				'current' => $barracuda_paged,
			));
			?>
		</div>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
