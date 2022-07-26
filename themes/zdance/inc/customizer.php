<?php
/**
 * zdance Theme Customizer
 *
 * @package zdance
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zdance_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'zdance_social',
		array(
			'title'    => 'Social Links',
			'priority' => 119,
		)
	);

	$wp_customize->add_setting(
		'zdance_facebook',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_url',
		)
	);

	$wp_customize->add_control(
		'zdance_facebook',
		array(
			'type'    => 'url',
			'section' => 'zdance_social',
			'label'   => __( 'Facebook', 'zdance' ),
		)
	);


	$wp_customize->add_setting(
		'zdance_instagram',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_url',
		)
	);

	$wp_customize->add_control(
		'zdance_instagram',
		array(
			'type'    => 'url',
			'section' => 'zdance_social',
			'label'   => __( 'Instagram', 'zdance' ),
		)
	);

	$wp_customize->add_setting(
		'zdance_youtube',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_url',
		)
	);

	$wp_customize->add_control(
		'zdance_youtube',
		array(
			'type'    => 'url',
			'section' => 'zdance_social',
			'label'   => __( 'YouTube', 'zdance' ),
		)
	);

}
add_action( 'customize_register', 'zdance_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function zdance_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function zdance_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zdance_customize_preview_js() {
	wp_enqueue_script( 'zdance-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), ZDANCE_VERSION, true );
}
add_action( 'customize_preview_init', 'zdance_customize_preview_js' );
