<?php
/*
  Template Name: Forms Page
*/

/**
 *
 * @package chandenhomes
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="forms-header">
				<h1>Forms</h1>
			</div>
			<div class="lines">

			<div class="downloadable-forms container width-900">
				<h2>Downloadable Forms</h2>
				<?php

					if( have_rows('forms') ):

					    while ( have_rows('forms') ) : the_row();?>

								<div class="d-form">
									<?php $pdf = get_sub_field('form'); ?>
									<a href="<?=$pdf['url']?>" target="_blank"><?=get_sub_field('form_title');?></a>
								</div>

					    <?php endwhile;

					else :


					endif;

				 ?>
			</div>

			<div id="about" class="fillable-forms container paddings">
				<h2>Online Application</h2>
				<div class="about-buttons">
					<a class="about-button giving yellow-button load-about">APPLICATION FORM</a>
				</div>
				<div class="about-buttons">
					<a class="about-button board yellow-button">GUARANTOR FORM</a>
				</div>
				<div class="about-buttons">
					<a class="about-button reports yellow-button"> ASSIGNMENT OF TENANCY FORM</a>
				</div>

				<div class="about-block giving-block">
					<?=do_shortcode('[gravityform id="2" title="false" description="false"]');?>
				</div>

				<div class="about-block board-block">
					<?=do_shortcode('[gravityform id="3" title="false" description="false"]');?>
				</div>

				<div class="about-block reports-block">
					<?=do_shortcode('[gravityform id="4" title="false" description="false"]');?>
				</div>

			 </div>
		 </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
