<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>
	<?php
	while ($query->have_posts())
	{
		$query->the_post();

		?>

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

		<?php
	}
	?>

	<div class="pagination">

		<div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>
