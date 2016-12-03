"use strict";

jQuery(document).ready(function () {
    _initCoverMe();
    _initPreviewCycle('.image-slider');    
    _initNewsCarousel('.news-list');
    _initSlider('#slider');
    _initGridCarousel('.grid-carousel');
    _initMap('detail-map');
    _initMap('contact-map');
    _initFilter();
    _initGallery();
    _initGraph();
    _initMagazineSlider('#magazine-slider');


    $(".youtube").colorbox({iframe: true, innerWidth: 640, innerHeight: 390});
    $('select').chosen();
    $('#tab-container').easytabs({
        animate: false
    });
    $('input[type="checkbox"]').ezMark();
});

function _initCoverMe() {
    $('img.cover-me').each(function(index) {
        var image = $(this);
        var picture_wrapper = $(this).closest('.picture');
        var cover_element = $('<div class="covered"></div>').css({
            'height': picture_wrapper.width() + 10 + 'px',
            'width': picture_wrapper.width() + 10 + 'px',
            'background-image': 'url(' + image.attr('src') + ')'
        });

        $(this).hide().after(cover_element);
    });
}

/**
 * Gallery on car detail page
 * @private
 */
function _initGallery() {
    $('.gallery').bxSlider({
        pagerSelector: '#gallery-pager .pager',
        mode: 'vertical',
        nextSelector: '#gallery-pager .next',
        nextText: '',
        prevSelector: '#gallery-pager .prev',
        prevText: '',
        buildPager: function (slideIndex) {
            var selector = '.thumbnail-' + slideIndex;
            return $(selector).html();
        }
    });
}

/**
 * Initializing range sliders in filter
 * @private
 */
function _initFilter() {
    $("#price-input").slider({
        from: 100,
        to: 15000,
        step: 100,
        round: 1,
        format: { format: '##', locale: 'en' },
        dimension: '&nbsp;$'
    });

    $("#km-input").slider({
        from: 100,
        to: 100000,
        step: 100,
        round: 1,
        format: { format: '##', locale: 'en' },
        dimension: '&nbsp;km'
    });

}

function _initPreviewCycle(selector) {
    $(selector).cycle({
        paused: true,
        slides: '> .slide'
    });
}

function _initGridCarousel(selector) {
    $(selector).bxSlider({
        adaptiveHeight: true,
        minSlides: 1,
        maxSlides: 4,
        slideWidth: 285,
        pagerType: 'short',
        pager: false,
        controls: true,
        moveSlides: 1,
        pagerSelector: '#grid-carousel-pager',
        nextSelector: '#grid-carousel-pager .next',
        nextText: '',
        prevSelector: '#grid-carousel-pager .prev',
        prevText: ''
    });
    $(selector).click();
}

function _initNewsCarousel(selector) {
    var news = $(selector).bxSlider({
        minSlides: 1,
        mode: 'vertical',
        pause: 6000,
        autoStart: true,
        maxSlides: 1,
        pagerType: 'short',
        controls: false,
        pager: false,
        responsive: true
    });

    news.startAuto();
}

function _initSlider(selector) {
    $(selector).bxSlider({
        slideWidth: 650,
        minSlides: 1,
        maxSlides: 1,
        pagerType: 'short',
        pagerSelector: '#slider-pager',
        nextSelector: '#slider-navigation .next',
        nextText: '',
        prevSelector: '#slider-navigation .prev',
        prevText: '',
        slideMargin: 0,
        onSlideBefore: function ($slideElement, oldIndex, newIndex) {
            var newSlide = jQuery('.slide').not('.bx-clone').eq(newIndex);
            var oldSlide = jQuery('.slide').not('.bx-clone').eq(oldIndex);
            oldSlide.removeClass('active');
            newSlide.addClass('active');
            $('.overview-table', newSlide).hide();
            var newOverview = jQuery('#overviews .overview').eq(newIndex);
            var oldOverview = jQuery('#overviews .overview').eq(oldIndex);

            newOverview.addClass('active');
            oldOverview.removeClass('active');
        }
    });
}

function _initMagazineSlider(selector) {
    var slider = $(selector).bxSlider({
        controls: false,
        pager: false
    });

    jQuery("#magazine-slider-pager .bx-page").hover(function () {
        jQuery('#magazine-slider-pager .bx-page').removeClass('active');
        jQuery(this).addClass('active');
        slider.goToSlide($(this).attr('data-slide-index'));
    }, function () {

    });
}

function _initMap(elementId) {
    var element = document.getElementById(elementId);

    if (element === null) {
        return;
    }
    var myOptions = {
        zoom: 17,
        center: new google.maps.LatLng(53.385873, -1.471471),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(element, myOptions);

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(53.385873, -1.471471),
        map: map
    });
}

function _initGraph() {

    if ($('#site_statistics').length === 0) {
        return;
    }

    var priceMin = [
        [1362096000000, 44.1],
        [1364774400000, 46.5],
        [1367366400000, 48.1],
        [1370044800000, 42.3],
        [1372636800000, 41.4],
        [1375315200000, 43.3],
        [1377993600000, 44.7],
        [1380585600000, 38.9],
        [1383264000000, 42.0],
        [1385856000000, 35.9]
    ];

    var priceMax = [
        [1362096000000, 48.0],
        [1364774400000, 50.3],
        [1367366400000, 51.4],
        [1370044800000, 47.5],
        [1372636800000, 47.9],
        [1375315200000, 46.7],
        [1377993600000, 49.3],
        [1380585600000, 45.1],
        [1383264000000, 46.2],
        [1385856000000, 44.8]
    ];


    $("#site_statistics").bind("plothover", function (event, pos, item) {
        var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";

        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);

                var date = new Date(parseInt(x));
                var month = new Array();
                month[0]="Jan";
                month[1]="Feb";
                month[2]="Mar";
                month[3]="Apr";
                month[4]="May";
                month[5]="Jun";
                month[6]="Jul";
                month[7]="Aug";
                month[8]="Sep";
                month[9]="Oct";
                month[10]="Nov";
                month[11]="Dec";
                var formattedDate = month[date.getMonth()];

                var formattedPrice = parseInt(y) * 1000 + "$";
                showTooltip(item.pageX, item.pageY,
                    item.series.label + " of " + formattedDate + " : " + formattedPrice);
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });


    $.plot($("#site_statistics"), [
        {
            data: priceMax,
            label: "Max price"
        },
        {
            data: priceMin,
            label: "Min price"
        }
    ],
        {
            series: {
                lines: {
                    show: true,
                    lineWidth: 3,
                    fill: false,
                    hoverable: true
                },
                shadowSize: 0
            },
            legend: {
                show: false
//                color: "rgba(0,0,0, 0.6)"
            },

            grid: {
                labelMargin: 10,
                axisMargin: 10,
                hoverable: true,
                clickable: true,
                color: "rgba(0,0,0,0.05)",
                tickColor: "rgba(0,0,0,0.05)"
            },
            colors: ["#0076a2", "#f95446"],
            xaxis: {
                mode: "time",
                minTickSize: [1, "month"],
                maxTickSize: [1, "month"],
                min: (new Date(2013, 4)).getTime(),
                max: (new Date(2013, 12)).getTime()
            }
        });
}

function showTooltip(x, y, contents) {
    $("<div id='tooltip'>" + contents + "</div>").css({
        position: "absolute",
        display: "none",
        top: y + 5,
        left: x + 5,
        border: "1px solid #000",
        padding: "5px",
        'color': '#fff',
        'border-radius': '2px',
        'font-size': '11px',
        "background-color": "#000",
        opacity: 0.80
    }).appendTo("body").fadeIn(200);
}