$(function () {
    var baseUrl = window.location.origin + window.location.pathname;
    $('.nav-item').removeClass('active');
    $('.nav-link').each(function (v, k) {
        if ($(k).attr('href') == baseUrl) {
            $(k).parents('.nav-item').addClass('active');
        }
    });

    $('body').on('click', 'ul.nav a', function (e) {
        // e.preventDefault();
    });

    $('body').on('click', '.dropdown-submenu.dropdown', function (e) {
        // e.preventDefault();
        // var _sefl = $(this);
        // _sefl.find('ul.drop-ul').css('display', 'block !important');
        // console.log(_sefl.find('ul.drop-ul'));

    });


});

var swiper1 = new Swiper('.product-slide', {
    slidesPerView: 4,
    spaceBetween: 10,
    breakpoints: {
        // when window width is <= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is <= 480px
        480: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is <= 745px
        745: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        // when window width is <= 1200px
        1200: {
            slidesPerView: 4,
            spaceBetween: 20
        },
        // when window width is <= 1920px
        1920: {
            slidesPerView: 4,
            spaceBetween: 20
        }
    },
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    }
});

var swiper2 = new Swiper('.article-slide', {
    slidesPerView: 3,
    spaceBetween: 25,
    breakpoints: {
        // when window width is <= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 25
        },
        // when window width is <= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 25
        },
        // when window width is <= 745px
        745: {
            slidesPerView: 2,
            spaceBetween: 25
        },
        // when window width is <= 1200px
        1200: {
            slidesPerView: 3,
            spaceBetween: 25
        },
        // when window width is <= 1920px
        1920: {
            slidesPerView: 3,
            spaceBetween: 25
        }
    }
});

var swiper3 = new Swiper('.partner-slide', {
    slidesPerView: 6,
    spaceBetween: 20,
    breakpoints: {
        // when window width is <= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is <= 480px
        480: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is <= 745px
        745: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        // when window width is <= 1200px
        1200: {
            slidesPerView: 6,
            spaceBetween: 20
        },
        // when window width is <= 1920px
        1920: {
            slidesPerView: 6,
            spaceBetween: 20
        }
    }
});

function get_query(url) {
    // var url = location.search;
    var qs = url.substring(url.indexOf('?') + 1).split('&');
    for(var i = 0, result = {}; i < qs.length; i++){
        qs[i] = qs[i].split('=');
        result[qs[i][0]] = decodeURIComponent(qs[i][1]);
    }
    return result;
}

function trimText(str ,wordCount) {
    var strArray = str.split(' ');
    var subArray = strArray.slice(0, wordCount);
    var result = subArray.join(" ");
    if (strArray.length < wordCount) {
        return result;
    } else {
        return result + '...';
    }
}
