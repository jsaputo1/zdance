<?php
/**
 * The testimonials component template file
 *
 * Fields:
 * video                repeater
 *      embed_code      text
 *      title           text
 *      description     WYSIWYG
 *
 * @package zdance
 */

$index = get_row_index();
$count = 0;

?>
<div class="component component-video-gallery" id="<?php echo esc_attr( 'section-id-' . $index ); ?>">
	<div class="row wrapper">
        <?php while ( have_rows( 'video' ) ) : the_row(); ?>
            <div class="col-lg-4 video-wrapper">
                <iframe class="video" src="https://www.youtube.com/embed/<?php echo the_sub_field( 'embed_code' ); ?>" title="YouTube video player" data-slide="<?php echo $count; ?>" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <?php $count++ ?>
        <?php endwhile; ?>
	</div>
</div>

<div class="video">Hello</div>

<!-- Modal -->
<div class="modal fade" id="videoGalleryModal" tabindex="-1" aria-labelledby="galleryModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="video-gallery-modal-wrapper">
                    <div class="video-gallery-slick">
                        <?php while ( have_rows( 'video' ) ) : the_row(); ?>
                            <div><iframe class="video" src="https://www.youtube.com/embed/<?php echo the_sub_field( 'embed_code' ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
