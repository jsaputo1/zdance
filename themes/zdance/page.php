<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zdance
 */

get_header();
?>

<main id="primary" class="site-main container">

<?php
while ( have_posts() ) :
	the_post();

	zdance_render_flexible_content();

endwhile; // End of the loop.
?>

</main><!-- #main -->

<?php
get_footer();
