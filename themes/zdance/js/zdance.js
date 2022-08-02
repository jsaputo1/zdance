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

    var galleryModal = new bootstrap.Modal(document.getElementById('galleryModal'));

    var galleryClick = function () {
        $(".component-photo-gallery .image-wrapper img").click(function () {
            galleryModal.toggle();
            $('.photo-gallery-slick').slick('reinit');
            $('.photo-gallery-slick').slick('slickGoTo', this.dataset.slide);
            $('.photo-gallery-slick').slick('reinit').css({ height: '' });
        });
    };

    galleryClick();

    $("#loadPhotos").click(function () {
        $.ajax({
            method: 'GET',
            url: 'http://localhost:8888/zdance/wp-json/wp/v2/pages/112?_fields=acf.components',
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
                galleryClick();
            }
        });
    });

});   