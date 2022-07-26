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
	    <div class="banner">	
		    <h2><?php the_sub_field( 'title' ); ?></h2>
	    </div>
    <?php endif; ?>
	<div class="row">
		<?php while ( have_rows( 'testimonial' ) ) : the_row(); ?>
			<div class="col-12 wrapper flex-column">
                <p class="caption"><?php the_sub_field( 'caption' ); ?></p>
				<h4 class="name"><?php the_sub_field( 'name' ); ?></h4>
                <?php if ( get_sub_field( 'title') ) : ?>
				    <span><?php the_sub_field( 'title' ); ?></span>
                <?php endif; ?>
			</div>
		<?php endwhile; ?>
	</div>
</div>