<?php
/**
 * The hero component template file
 *
 * Fields:
 * title         text
 * image         image url
 *
 * @package zdance
 */

$index = get_row_index();

?>
<div class="component-hero" id="<?php echo esc_attr( 'section-id-' . $index ); ?>">
    <div class="wrapper span-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.33), rgba(0, 0, 0, 0.33)), url(<?php echo esc_url( get_sub_field( 'image' ) ); ?>">
        <div class="text">
            <h1><?php the_sub_field( 'title' ); ?></h1>
        </div>
    </div>
</div>