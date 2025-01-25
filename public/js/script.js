$(function () {
    /* services slider */
    $('.services-slider.owl-carousel').owlCarousel({
        loop: false,
        margin: 30,
        autoplay: true,
        autoplayTimeOut: 5000,
        autoplayHoverPause: true,
        smartSpeed: 700,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1500: {
                items: 5
            }
        }
    })

    $('.testimonial-slider.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeOut: 5000,
        autoplayHoverPause: true,
        smartSpeed: 700,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
        }
    })

    $('.landing-slider.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeOut: 5000,
        autoplayHoverPause: false,
        smartSpeed: 700,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            }
        }
    })

    $('.partners-slider.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeOut: 5000,
        autoplayHoverPause: false,
        smartSpeed: 700,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1500: {
                items: 4
            }
        }
    })
});
