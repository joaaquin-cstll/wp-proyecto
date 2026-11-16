   <div class="sidebar">
	<!-- Search widget-->
	<aside class="widget widget_search">
	<form method="get" action="<?php echo home_url('/'); ?>">
	<input class="form-control" name="s" id="s"type="search" placeholder="Type search here">
	<button class="search-button" type="submit"><span class="fa fa-search"></span></button>
			</form>
		</aside>

	<!-- Text widget-->
	<aside class="widget widget_text">
		<div class="widget-title">
			<h6>Calendar</h6>
		</div>
		<div class="textwidget">
		<!--habilitamos una zona de widgets--> 
		<?php if (!function_exists('dynamic_sidebar' )|| !dynamic_sidebar('Sidebar Widget')):;?> <!-- si no hay widget instaldos visualizamos el sigueinte mensaje-->
		<p class="warning">No widget already installed for this theme</p>
			<?php endif;?>
		</div>
	</aside>

	<!-- Recent entries widget-->
	<aside class="widget widget_recent_entries_custom">
		<div class="widget-title">
		<h6>Recent Posts</h6>
		</div>
		<ul>
			<?php 
			$args = array(
				'posts_per_page' => 5
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
			<li class="clearfix">
				<div class="wi"><a href="#"><img src="<?php echo $img_url; ?>" alt=""></a></div>
				<div class="wb"><a href="#"><?php the_title();?></a><span class="post-date"><?php the_time('F j, Y'); ?></span></div>
			</li>

			<?php 
			endwhile;;
		else: 
			echo "No posts found";
		endif;

			?>
		</ul>
	</aside>

	<!-- Twitter widget-->
	<aside class="widget twitter-feed-widget">
		<div class="widget-title">
			<h6>Authors</h6>
		</div>
		<div class="twitter-feed" data-twitter="345170787868762112" data-number="2">
			<ul class="no-vineta">
			<?php 
				wp_list_authors('hide_empty=0&optioncount=1&orderby=post_count&order=DESC');
			?>
			</ul>
		</div>
	</aside>

	<!-- Twitter widget-->
	<aside class="widget twitter-feed-widget">
		<div class="widget-title">
			<h6>Categories</h6>
		</div>
		<div class="twitter-feed" data-twitter="345170787868762112" data-number="2">
			<ul class="no-vineta">
			<?php 
				wp_list_categories('title_li=&show_count=1');
			?>
			</ul>
		</div>
	</aside>

	<!-- Tags widget-->
	<aside class="widget widget_tag_cloud">
		<div class="widget-title">
			<h6>Tags</h6>
		</div>
		<div class="tagcloud"><?php the_tags('' , '' , ''); ?></div>
	</aside>
		</div>