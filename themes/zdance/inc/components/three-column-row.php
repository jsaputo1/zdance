<?php
/**
 * The testimonials component template file
 *
 * Fields:
 * title         text
 * column        repeater
 *      image    image id
 *      text     text
 *
 * @package zdance
 */

$index = get_row_index();

?>
<div class="component component-three-column-row" id="<?php echo esc_attr( 'section-id-' . $index ); ?>">
    <?php if ( get_sub_field( 'title') ) : ?>
        <h2 class="text-center mb-4"><?php the_sub_field( 'title' ); ?></h2>
    <?php endif; ?>
	<div class="row">
        <?php while ( have_rows( 'column' ) ) : the_row(); ?>
            <div class="col-lg-4 wrapper">
                <figure class="image"><?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'full' ); ?></figure>
                <div class="text"><?php the_sub_field( 'text' ); ?></div>
            </div>
        <?php endwhile; ?>
	</div>
</div>