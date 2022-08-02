jQuery(document).ready(function ($) {
    $('.testimonial-slick').slick({
        dots: true,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        centerMode: true,
        adaptiveHeight: true,
        infinite: true,
    });

    $('.photo-gallery-slick').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear'
    });


    $('.video-gallery-slick').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear'
    });

    if ($('.component').hasClass('component-photo-gallery')) {
        var galleryModal = new bootstrap.Modal(document.getElementById('galleryModal'));

        var photoGalleryClick = function () {
            $(".component-photo-gallery .image-wrapper img").click(function () {
                galleryModal.toggle();
                $('.photo-gallery-slick').slick('reinit');
                $('.photo-gallery-slick').slick('slickGoTo', this.dataset.slide);
                $('.photo-gallery-slick').slick('reinit').css({ height: '' });
            });
        };

        photoGalleryClick();

        $("#loadPhotos").click(function () {
            $.ajax({
                method: 'GET',
                url: '/wp-json/wp/v2/pages/112?_fields=acf.components',
            }).done(function (data, status, xhr) {
                let count = 0;
                $('#galleryItems > div').each(function () {
                    count++;
                });
                imageIndex = count + 1;
                for (let i = 0; i < 8; i++) {
                    $('#galleryItems').append(
                        `<div class="col-lg-3 image-wrapper">
                            <img src="${data.acf.components[1].gallery[imageIndex].sizes.large}" alt="${data.acf.components[1].gallery[imageIndex].alt}" data-slide="${imageIndex}" />
                        </div>`
                    );
                    imageIndex++;
                    photoGalleryClick();
                }
            });
        });
    };

    if ($('.component').hasClass('component-video-gallery')) {

        var videoStop = function () {
            var vid = jQuery('.video iframe[src*="youtube"]');
            if ( vid.length > 0 ){
              var src = vid.attr('src');
              vid.attr('src', '');
              vid.attr('src', src);
            }
        }

        var videoGalleryModal = new bootstrap.Modal(document.getElementById('videoGalleryModal'));

        $(".component-video-gallery .video-wrapper .video").click(function () {
            console.log('working');

        });

        $(".video-wrapper").click(function () {
            videoGalleryModal.toggle();
            $('.video-gallery-slick').slick('reinit');
            $('.video-gallery-slick').slick('slickGoTo', this.dataset.slide);
            $('.video-gallery-slick').slick('reinit').css({ height: '' });

        });
    }





});   