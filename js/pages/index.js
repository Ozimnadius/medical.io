//index.js
$(function () {

    $('.serv__top').on('click', function (e) {
        let $this = $(this),
            item = $this.closest('.serv'),
            bottom = item.find('.serv__bottom'),
            items = $('.serv').not(item);

        items.removeClass('open');
        items.find('.serv__bottom').slideUp(300);
        bottom.slideToggle(300);
        item.toggleClass('open');
    });


    let edgesSlider = new Swiper ('.edges__container', {
        loop: true,
        slidesPerView: 'auto',
        spaceBetween: 20,
        grabCursor: true,
        slidesOffsetBefore: 20
    });

    // $('.call__input').mask('+7 (999) 999 - 99 - 99');

    $('.item__top').on('click', function (e) {
        let $this = $(this),
            item = $this.closest('.item'),
            bottom = item.find('.item__bottom'),
            items = $('.item').not(item);

        items.removeClass('open');
        items.find('.item__bottom').slideUp(300);
        bottom.slideToggle(300);
        item.toggleClass('open');
    });

    $('.stick__close').on('click', function (e) {
        $(this).closest('.stick').addClass('disabled');
    });
});