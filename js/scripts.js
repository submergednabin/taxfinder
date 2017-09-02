jQuery(document).ready(function ($) {
    "use strict";


    //slider
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        items: 8,
        dots: true,
        responsive: {
            320: {
                items: 2,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                dots: false
            },
            600: {
                items: 3,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                dots: false
            },
            768: {
                items: 6,
                dots: true,
                nav: false
            },
            1000: {
                items: 8,
                dots: true,
                nav: false
            }
        }
    });

    // convert tab to accordion
    $('#list-nav-tabs').tabCollapse();

    //  scrolldown add remove class
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 30) {
            $(".lang-translate, .header-tel").addClass("hidden");
        } else {
            $(".lang-translate, .header-tel").removeClass("hidden");
        }
    });


    // Trigger filter
    var filterTrigger = $('.filter > .trigger');

    filterTrigger.on('click', function () {
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).parent().find('ul').slideToggle('fast');
        } else {
            $(this).parent().find('ul').hide('fast');
        }

    });


    //price slider
    function showProducts(minPrice, maxPrice) {
        $(".item-list-box li").show().filter(function () {
            var price = parseInt($(this).data("price"), 10);
            return price >= minPrice && price <= maxPrice;
        }).show();
    }

    $(function () {
        var options = {
            range: true,
            min: 0,
            max: 1200,
            values: [250, 1000],
            slide: function (event, ui) {
                var min = ui.values[0],
                    max = ui.values[1];

                $("#minAmount").val("SR " + min);
                $("#maxAmount").val("SR " + max);
                showProducts(min, max);
            }
        }, min, max;

        $("#price-range").slider(options);

        min = $("#price-range").slider("values", 0);
        max = $("#price-range").slider("values", 1);

        $("#minAmount").val("SR " + min);
        $("#maxAmount").val("SR " + max);

        showProducts(min, max);
    });


    //match height
    $(function () {
        $('.dish-item').matchHeight();
    });

    $(function () {
        $('.swipebox').swipebox();
    });


    $('.responsive-table').each(function () {
        var thetable = $(this);
        $(this).find('tbody td').each(function () {
            $(this).attr('data-heading', thetable.find('thead th:nth-child(' + ($(this).index() + 1) + ')').text());
        });
    });




    $('.accordion-question').click(function () {
        if ($(this).parent().is('.open')) {
            $(this).closest('.accordion-list').find('.accordion-answer-container').hide('fast');
            $(this).closest('.accordion-list').removeClass('open');
        } else {
            $(this).parent().parent().find('.accordion-list').removeClass('open');
            $('.accordion-answer-container').hide('fast');
            $(this).closest('.accordion-list').addClass('open');
            $(this).closest('.accordion-list').find('.accordion-answer-container').show('fast');
        }
    });

//
});