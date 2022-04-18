require('../../default/js/app')

const copyrights = document.querySelectorAll('footer .copyright');
copyrights.forEach(el => {
    const text = el.innerHTML.replace('Rosalia Express', '<span class="text-danger">Rosalia Express</span>');
    el.innerHTML = text
})

document.addEventListener('DOMContentLoaded', function () {
    new Splide('#slider-promo', {
        gap: 10,
        type: 'loop',
        focus: 'left',
        autoplay: true,
        perPage: 3.2,
        autoScroll: {
            speed: 1,
        },
        breakpoints: {
            640: {
                perPage: 2.2,
            },
            480: {
                perPage: 1.2,
            },
        }
    }).mount();

    new Splide('#slider-services', {
        gap: 10,
        type: 'loop',
        focus: 'left',
        autoplay: true,
        pagination: false,
        perPage: 3.2,
        autoScroll: {
            speed: 1,
        },
        breakpoints: {
            640: {
                perPage: 2.2,
            },
            480: {
                perPage: 1.2,
            },
        }
    }).mount();

    new Splide('#slider-review', {
        gap: 10,
        type: 'loop',
        focus: 'left',
        autoplay: true,
        arrows: false,
        perPage: 2.2,
        autoScroll: {
            speed: 1,
        },
        breakpoints: {
            480: {
                perPage: 1.2,
            },
        }
    }).mount();
});
