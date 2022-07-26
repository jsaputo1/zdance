<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zdance
 */

?>

	<footer id="colophon" class="site-footer bg-dark d-flex justify-content-center py-6">
		<div class="contact">

		</div>
		<div class="social-links">
			<?php zdance_the_social_links(); ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
