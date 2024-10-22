<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chandenhomes
 */

?>

<div id="abdel-modal-overlay" class="abdel-modal-overlay"></div>
    <div id="abdel-modal" class="abdel-modal">
        <button id="abdel-modal-close" class="abdel-modal-close">&times;</button>
        <div id="abdel-modal-content" class="abdel-modal-content"></div>
    </div>
	<?php
		$privacy_policy_content = get_field('privacy_policy', 'option');
		$terms_of_service_content = get_field('terms_of_services', 'option');
	?>
	<script>
		jQuery(document).ready(function($) {
			// Privacy Policy and Terms of Service content from ACF Pro
			var privacyPolicyContent = <?php echo json_encode($privacy_policy_content); ?>;
			var termsOfServiceContent = <?php echo json_encode($terms_of_service_content); ?>;

			// Handle the modal opening when either link is clicked
			$('.abdel-open-modal').click(function(e) {
				e.preventDefault();
				
				// Get the content type from the clicked link's data attribute
				var contentType = $(this).data('content');
				var modalContent;

				// Determine which content to show based on the content type
				if (contentType === 'privacy-policy') {
					modalContent = privacyPolicyContent;
				} else if (contentType === 'terms-of-service') {
					modalContent = termsOfServiceContent;
				}

				// Set the modal content
				$('#abdel-modal-content').html(modalContent);

				// Show the modal
				$('#abdel-modal-overlay').addClass('open');
				$('#abdel-modal').addClass('open');
			});

			// Handle the modal closing when clicking outside or on the close button
			$('#abdel-modal-close, #abdel-modal-overlay').click(function() {
				$('#abdel-modal-overlay').removeClass('open');
				$('#abdel-modal').removeClass('open');
			});
		});
	</script>

	</div><!-- #content -->


	<footer id="colophon" class="site-footer">

		<div class="footer-logo">
			<img src="/wp-content/themes/chandenhomes/images/footer-logo.png" alt="Chanden Homes Logo">
		</div>

		<div class="phone">
			<a href="tel:+12042727846">204-272-7846</a>
		</div>

		<div class="copyright center">
			<span class="copyright-text">&copy; Chanden Homes <?php echo date('Y'); ?>. </span>
			<span class="site-by">Site by <a href="https://psone.ca/" target="_blank">Print Studio One</a><span> | </span><a href="https://threesixnorth.com/" target="_blank">Three-Six North Marketing</a>.</span>
		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
