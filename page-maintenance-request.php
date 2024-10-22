<?php
/*
  Template Name: Maintenance Request
*/

/**
 *
 * @package chandenhomes
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="connect-header2">
				<img src="/wp-content/themes/chandenhomes/images/maintenance.jpg" alt="Kitchen">
				<h1>Maintenance Request</h1>
			</div>

			<div class="contact-form2">
				<div class="container width-800">

					<h2>Maintenance Request</h2>
					<a href="tel:1+2042727846">CALL OR TEXT 204-272-7846</a>

					<?=do_shortcode('[gravityform id="5" title="false"]');?>
					
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
