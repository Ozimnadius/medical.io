//index.js
$(function () {

    const popup = $('.popup');
    let recaptcha;

    $('.menu__btn').on('click', function (e) {
        openMenu();
    });

    $('.nav__close').on('click', function (e) {
        closeMenu();
    });

    function openMenu() {
        $('.nav').addClass('active');
    }

    function closeMenu() {
        $('.nav').removeClass('active');
    }

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


    let edgesSlider = new Swiper('.edges__container', {
        loop: true,
        slidesPerView: 'auto',
        spaceBetween: 20,
        grabCursor: true,
        slidesOffsetBefore: 20
    });

    $('input[name=revDate]').mask('99.99.9999');

    $('body').on('click', '.item__top', function (e) {
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

    $('.search__input').on('input', $.debounce(sendAjax, 300));

    function sendAjax() {
        let $this = $('.search__input'),
            val = $this.val(),
            form = $this.closest('.search__form'),
            rep = form.find('.search__list'),
            data = form.serialize();

        if (val.length > 0) {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: 'ajax.php',
                data: data,
                success: function (result) {
                    if (result.status) {
                        rep.html(result.html);
                    } else {
                        alert('Что-то пошло не так, попробуйте еще раз!!!');
                    }
                },
                error: function (result) {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            });
        } else {

        }

    }

    var verifyCallback = function(response) {
        popup.find('.form__submit').addClass('active');
    };

    function addPopupContent(html){
        popup.html(html).addClass('active');
        closeMenu();
        popup.find('input[type=tel]').mask('+7 (999) 999-99-99');
        recaptcha = grecaptcha.render('recaptcha', {
            'sitekey': '6LdvmLcUAAAAAK2ZKelcOn-ltDGTqLx_wKtcUGdh',
            'theme': 'light',
            'callback': verifyCallback,
        });
    }

    $('body').on('click','.form__close, .success__close, .success__button', function (e) {
       popup.removeClass('active');
    });

    $('body').on('click','.form__submit', function (e) {
        let $this = $(this),
            popupWrapper = $('<div>').addClass('popup__wrapper'),
            data = $this.closest('.form').serialize();


        $.ajax({
            dataType: "json",
            type: "POST",
            url: 'ajax.php',
            data: data,
            success: function (result) {
                if (result.status) {
                    popup.html('');
                    popupWrapper.html(result.html);
                    popup.append(popupWrapper);
                    popup.addClass('active');

                } else {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            },
            error: function (result) {
                alert('Что-то пошло не так, попробуйте еще раз!!!');
            }
        });
    });

    $('.jsAddRev').on('click', function (e) {
        e.preventDefault();
        let $this = $(this),
            template = $('#rev'),
            html = template.find('.form').clone();

        addPopupContent(html);

    });

    $('.jsAddClinic').on('click', function (e) {
        e.preventDefault();
        let $this = $(this),
            template = $('#add'),
            html = template.find('.form').clone();

        addPopupContent(html);

    });

    $('.jsCallme').on('click', function (e) {
        e.preventDefault();
        let _href = $(this).attr("href");
        $("html, body").animate({scrollTop: $(_href).offset().top-60+"px"});

        closeMenu();
    });

    $('body').on('submit','.form', function (e) {
        e.preventDefault();
    });

    $('.call__form').on('submit', function (e) {
       e.preventDefault();

        let $this = $(this),
            popupWrapper = $('<div>').addClass('popup__wrapper'),
            data = $this.serialize();


        $.ajax({
            dataType: "json",
            type: "POST",
            url: 'ajax.php',
            data: data,
            success: function (result) {
                if (result.status) {
                    popup.html('');
                    popupWrapper.html(result.html);
                    popup.append(popupWrapper);
                    popup.addClass('active');

                } else {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            },
            error: function (result) {
                alert('Что-то пошло не так, попробуйте еще раз!!!');
            }
        });
    });
});