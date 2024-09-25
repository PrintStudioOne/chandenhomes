<?php
/*
  Template Name: Home Page
*/

/**
 *
 * @package chandenhomes
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<div class="flexslider-wrapper">
			<?php
				$args = array(
					'post_type' => 'front_slider',
					'posts_per_page' => -1 ,
					'post_status' => 'publish'
					);
				$query = new WP_Query($args);
			?>

			<div id="slider" class="flexslider flex-slider">
				<ul class="slides">
					<?php
						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					<li class="">
						<?php $image = get_field('image'); ?>
						<img src="<?=$image['url'];?>" alt="<?=$image['alt']?>" />
						<div class="flexslider-overlay container">
							<div class="slide-content container-fluid">
								<div class="radial"></div>
								<h1><?=the_title();?></h1>
								<?=the_content();?>
							</div>
						</div>
					</li>
					<?php
						endwhile; endif;
						wp_reset_query();
						wp_reset_postdata();
					?>
				</ul>
			</div>
		</div>

		<?php if (!empty(get_field('banner'))): ?>
		<div class="banner">
			<h2 class="container"><?=get_field('banner');?></h2>
		</div>
		<?php endif; ?>

		<div class="featured">
			<div class="width-1300">
				<div class="width-800 center">
					<?=get_field('section_1');?>
					<div class="center">
						<a href="/contact">CONNECT WITH US</a>
					</div>
				</div>

				<div class="feature">
					<?php
						$args = array(
							'post_type' => 'property',
							'posts_per_page' => -1 ,
							'post_status' => 'publish'
							);
						$query = new WP_Query($args);
					?>

					<?php
						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php $feature = get_field('featured'); ?>
					<?php if($feature && in_array('featured', $feature)): ?>

					<div class="property">
						<a href="<?=the_permalink();?>">
							<?php $image = get_field('image'); ?>
							<img src="<?=$image['sizes']['property-thumbnail'];?>" alt="<?=$image['alt'];?>">
							<div class="prop-deets">
								<p><?=the_title();?></p>
								<p><?=get_field('location');?></p>
								<p>Price: &dollar;<?=get_field('price');?>/month</p>
								<p><?=get_field('bedrooms');?> bedroom | <?=get_field('bathrooms');?> bath</p>
							</div>
						</a>
					</div>

					<?php	endif; ?>
					<?php
						endwhile; endif;
						wp_reset_query();
						wp_reset_postdata();
					?>
				</div>
				<div class="center view">
					<a href="/properties">View All</a>
				</div>
			</div>
		</div>

		<div id="about" class="know-us">
			<div class="grey-grad">
				<div class="width-1500">
					<div class="know-us-info">
						<?=get_field('section_2');?>
					</div>
					<div class="know-us-img">
						<img src="/wp-content/themes/chandenhomes/images/big-logo.png" alt="Chanden Homes Logo">
					</div>
				</div>
			</div>
		</div>

		<div class="insta">
			<div class="container">
				<img src="/wp-content/themes/chandenhomes/images/instagram-grey.png" alt="Instagram Icon">
				<h2>Follow us on Instagram</h2>
				<?=do_shortcode('[instagram-feed]');?>
			</div>
		</div>

		<div class="testimonials">
			<div class="test-grad"></div>
			<div class="container width-800">
				<h2>What Our Customers Are Saying</h2>
				<div class="flexslider-wrapper">
					<?php
						$args = array(
							'post_type' => 'testimonials',
							'posts_per_page' => -1 ,
							'post_status' => 'publish'
							);
						$query = new WP_Query($args);
					?>

					<div id="slider" class="flexslider flex-slider2">
						<ul class="slides">
							<?php
								if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

							<li class="">
								<?=the_content();?>
								<p><?=the_title();?></p>
							</li>
							<?php
								endwhile; endif;
								wp_reset_query();
								wp_reset_postdata();
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>


	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();