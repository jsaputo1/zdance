<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package zdance
 */

if ( ! function_exists( 'zdance_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function zdance_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'zdance' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'zdance_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function zdance_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'zdance' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'zdance_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function zdance_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'zdance' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'zdance' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'zdance' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'zdance' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'zdance' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'zdance' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'zdance_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function zdance_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;


/**
 * Renders the different components defined in ACF Flexible Content.
 *
 * @param mixed $post_id    The post ID or item to pass to ACF get.
 *
 * @return void
 */
function zdance_render_flexible_content( $post_id = null ) {
	global $post;

	if ( is_null( $post_id ) ) {
		$post_id = $post->ID;
	}

	$template_path = get_template_directory();
	$acf_path      = $template_path . '/inc/components/';

	while ( have_rows( 'components', $post_id ) ) : the_row();
		$layout_name = str_replace( '_', '-', get_row_layout() );

		if ( defined( 'WP_DEBUG' ) && WP_DEBUG === true ) {
			echo '<!-- ' . $acf_path . $layout_name . '.php -->'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		include $acf_path . $layout_name . '.php';

	endwhile;
}

/**
 * Takes an ACF link field and returns a formatted button
 * @param array  $link ACF link field or array of url, title, and target.
 * @param string $classes A list of classes to apply to the button.
 *
 * @return void
 */
function zdance_acf_link_button( $link, $classes = 'btn-primary' ) {
	if ( ! is_array( $link ) || false === $link ) {
		return;
	}

	$target = isset( $link['target'] ) ? $link['target'] : false;

	$o = '<a class="btn ' . esc_attr( $classes ) . '" ';
	if ( '' !== $target && false !== $target ) {
		$o .= 'target="' . esc_attr( $target ) . '" ';
	}
	$o .= 'href="' . esc_attr( $link['url'] ) . '">' . $link['title'];

	$o .= '</a>';

	echo $o; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Output the social icons with links.
 *
 * @return void
 */
function zdance_the_social_links() {
	$theme = get_theme_mods();

	?>
		<div class="social-icons">
	<?php

	if ( isset( $theme['zdance_facebook'] ) && $theme['zdance_facebook'] !== '' ) :
	?>
		<a href="<?php echo esc_url( $theme['zdance_facebook'] ); ?>" rel="noopener nofollow">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/icon-facebook.svg' ); ?>" alt="Facebook logo" />
		</a>
	<?php
	endif;

	if ( isset( $theme['zdance_twitter'] ) && $theme['zdance_twitter'] !== '' ) :
	?>
		<a href="<?php echo esc_url( $theme['zdance_twitter'] ); ?>" rel="noopener nofollow">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/icon-twitter.svg' ); ?>" alt="Twitter logo" />
		</a>
	<?php
	endif;

	if ( isset( $theme['zdance_linkedin'] ) && $theme['zdance_linkedin'] !== '' ) :
	?>
		<a href="<?php echo esc_url( $theme['zdance_linkedin'] ); ?>" rel="noopener nofollow">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/icon-linkedin.svg' ); ?>" alt="LinkedIn logo" />
		</a>
	<?php
	endif;

	if ( isset( $theme['zdance_instagram'] ) && $theme['zdance_instagram'] !== '' ) :
	?>
		<a href="<?php echo esc_url( $theme['zdance_instagram'] ); ?>" rel="noopener nofollow">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/icon-instagram.svg' ); ?>" alt="Instagram logo" />
		</a>
	<?php
	endif;

	if ( isset( $theme['zdance_youtube'] ) && $theme['zdance_youtube'] !== '' ) :
	?>
		<a href="<?php echo esc_url( $theme['zdance_youtube'] ); ?>" rel="noopener nofollow">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/icon-youtube.png' ); ?>" alt="YouTube logo" />
		</a>
	<?php
	endif;

	if ( isset( $theme['zdance_blog'] ) && $theme['zdance_blog'] !== '' ) :
		?>
			<a href="<?php echo esc_url( $theme['zdance_blog'] ); ?>" rel="noopener nofollow">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/icon-blog.svg' ); ?>" alt="Blog icon" />
			</a>
		<?php
		endif;
}