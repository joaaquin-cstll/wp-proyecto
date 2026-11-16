<?php
/**
 * Template Name: CONTACT
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
						<div class="col-md-6">
							<?php the_content(); ?>
						</div>
						<div class="col-md-6">
							<ul class="icon-list">
								<li><i class="ti-email"></i> info@themebusiness.com</li>
								<li><i class="ti-headphone-alt"></i> 1-444-123-4559</li>
								<li><i class="ti-location-pin"></i> Raymond Boulevard 224, New York</li>
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
