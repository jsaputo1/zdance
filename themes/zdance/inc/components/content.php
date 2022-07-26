<?php
/**
 * The content component template file
 *
 * Fields:
 * content    WYSIWYG
 *
 * @package zdance
 */

$index = get_row_index();

?>
<div class="component component-content" id="<?php echo esc_attr( 'section-id-' . $index ); ?>">
	<div class="row">
		<div class="col-12 content">
			<?php the_sub_field( 'content' ); ?>
		</div>
	</div>
</div>
