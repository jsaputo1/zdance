<?php
/**
 * The text-image split component template file
 *
 * Fields:
 * title         text
 * text_first    boolean
 * content       WYSIWYG
 * image         image
 *
 * @package zdance
 */

$index = get_row_index();

?>
<div class="component component-text-split" id="<?php echo esc_attr( 'section-id-' . $index ); ?>">
	<div class="row">
		<?php if ( get_sub_field( 'title' ) ) : ?>
			<div class="col-12 title">
				<h2><?php the_sub_field( 'title' ); ?></h2>
			</div>
		<?php endif; ?>
		<div class="col-lg-6 text<?php echo ( ! get_sub_field( 'text_first' ) ) ? esc_attr( ' order-md-last' ) : ''; ?>">
			<?php the_sub_field( 'content' ); ?>
		</div>
		<div class="col-lg-6 image">
			<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'full' ); ?>
		</div>
	</div>
</div>