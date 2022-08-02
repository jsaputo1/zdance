<?php 
/**
 * The photo gallery component template file
 *
 * Fields:
 * gallery       photo gallery, returns image array
 *
 * @package zdance
 */
$row_num = get_row_index();
$numOfImages = 8;
$count = 0;
?>
<div class="component component-photo-gallery" id="section-id-<?php echo esc_attr( $row_num ); ?>">
    <div class="row wrapper" id="galleryItems">
        <?php foreach( array_slice( get_sub_field( 'gallery'), 0, $numOfImages ) as $image ) : ?>
            <div class="col-lg-3 image-wrapper">
                <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-slide="<?php echo $count; ?>" />
            </div>
            <?php $count++ ?>
        <?php endforeach; ?>
    </div>
    <div class="d-flex w-100 justify-content-center">
        <a class="btn btn-primary text-white" id="loadPhotos">Load More</a>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="photo-gallery-modal-wrapper">
                        <div class="photo-gallery-slick">
                            <?php foreach( get_sub_field( 'gallery') as $image ) : ?>
                                <div><img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>



