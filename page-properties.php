<?php
/*
  Template Name: Properties Page
*/

/**
 *
 * @package chandenhomes
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="browse">
				<div class="container center">
					<div class="width-800">
						<h2>Browse Our Properties</h2>
						<p>We offer a range of rent and lease spaces to suit your specific needs. Feel free to contact us for more information or for a viewing of any of our properties. We look forward to hearing from you!</p>
					</div>
					<?=do_shortcode('[searchandfilter id="102"]');?>
				</div>
			</div>

			<div class="properties width-1500">
				<?=do_shortcode('[searchandfilter id="102" show="results"]');?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
