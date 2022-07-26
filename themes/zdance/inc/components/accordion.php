<?php
/**
 * The accordion component template file
 *
 * Fields:
 * items       repeater
 * *  title     text
 * * content    WYSIWYG
 *
 * @package zdance
 */

$row_num = get_row_index();
$i = 1;

?>
<div class="component component-accordion" id="section-id-<?php echo esc_attr( $row_num ); ?>">

    <div class="accordion" id="accordionExample">

    <?php
    while ( have_rows( 'items' ) ) : the_row();
        ?>
         <div class="accordion-item">
            <div class="accordion-header" id="accordion-<?php echo esc_attr( $row_num ); ?>-heading-<?php echo esc_attr( $i ); ?>">
                <!-- <div class="accordion-title mb-0"> -->
                    <button 
                        class="accordion-button text-left collapsed" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#accordion-content-<?php echo esc_attr( $row_num ); ?>-item-<?php echo esc_attr( $i ); ?>" 
                        aria-expanded="false" 
                        aria-controls="#accordion-content-<?php echo esc_attr( $row_num ); ?>-item-<?php echo esc_attr( $i ); ?>"
                    >
                        <h3><?php the_sub_field( 'title' ); ?></h3>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/arrow-up.svg' ); ?> " />
                    </button>
                <!-- </div> -->
            </div>
            <div 
                id="accordion-content-<?php echo esc_attr( $row_num ); ?>-item-<?php echo esc_attr( $i ); ?>" 
                class="accordion-collapse collapse" 
                aria-labelledby="accordion-<?php echo esc_attr( $row_num ); ?>-heading-<?php echo esc_attr( $i ); ?>"
            >
                <div class="accordion-body col-lg-9 px-0">
                    <?php the_sub_field( 'content' ); ?>
                </div>
            </div>
        </div>
    <?php
    $i++;
    endwhile;
    ?>
</div>

