<?php
/**
 * The testimonials component template file
 *
 * Fields:
 * title         text
 * testimonial   repeater
 *      caption  textarea
 *      name     text
 *      title    text
 *
 * @package zdance
 */

$index = get_row_index();

?>
<div class="component component-testimonials" id="<?php echo esc_attr( 'section-id-' . $index ); ?>">
    <?php if ( get_sub_field( 'title') ) : ?>
        <h2><?php the_sub_field( 'title' ); ?></h2>
    <?php endif; ?>
	<div class="row">
        <div class="testimonial-slick">
            <?php while ( have_rows( 'testimonial' ) ) : the_row(); ?>
                <div>
                    <div class="col-lg-6 wrapper mx-2 mb-lg-0 mb-3">
                        <p class="caption"><?php the_sub_field( 'caption' ); ?></p>
                        <h4 class="name"><?php the_sub_field( 'name' ); ?></h4>
                        <?php if ( get_sub_field( 'title') ) : ?>
                            <span><?php the_sub_field( 'title' ); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
	</div>
</div>