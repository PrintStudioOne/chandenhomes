<?php
/*
  Template Name: Contact Page
*/

/**
 *
 * @package chandenhomes
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="connect-header">
				<img src="/wp-content/themes/chandenhomes/images/lets-connect.jpg" alt="Kitchen">
				<h1>Let's Connect</h1>
			</div>

			<div class="contact-form">
				<div class="container width-800">

					<h2>Have a Question or Want to Request a Showing?</h2>
					<a href="tel:1+2043460083">CALL OR TEXT 204-346-0083</a>

					<?=do_shortcode('[gravityform id="6" title="false"]');?>

				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
