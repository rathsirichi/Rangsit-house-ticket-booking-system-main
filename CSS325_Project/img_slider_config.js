const swiper = new Swiper('.swiper', {
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,

    },
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});