<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zdance
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'zdance' ); ?></a>

	

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-nav-menu" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'zdance' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="site-branding">
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php the_custom_logo(); ?>
								<span class="sr-only">
									<?php bloginfo( 'name' ); ?>
								</span>
							</a>
						</h1>
						<?php else : ?>
							<p class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php the_custom_logo(); ?>
								</a>
							</p>
						<?php endif; ?>
				</div><!-- .site-branding -->

				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'menu_id'         => 'primary',
							'depth'           => 3, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'div',
							'container_class' => 'collapse navbar-collapse justify-content-end',
							'container_id'    => 'primary-nav-menu',
							'menu_class'      => 'navbar-nav ml-auto',
							'dropdown_class'  => 'dropdown-menu-dark',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						)
					);
				?>
			</div>
		</nav>
	</header><!-- #masthead -->
