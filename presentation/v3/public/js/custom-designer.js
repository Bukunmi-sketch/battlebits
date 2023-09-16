$(document).ready(function ($) {
    $("#game-screen").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayHoverPause: false,
        items: 4,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });
    $('#game-screen a').lightBox();
    $('#game-screen a').click(function () {
        $("#lightbox-secNav-btnClose img").attr('src', 'presentation/v1/images/lightbox-btn-close.gif');
    });
    $(".contact-lst .cont-list-box").hide();
    $('.contact-lst').find('.right-arrow').click(function () {
        var next = $(this).parent();
        $('.right-arrow').removeClass("active");
        next.toggleClass("active").next().slideToggle('fast');
        $(".contact-lst .cont-list-box").not(next.addClass("active").next()).slideUp('fast');
    });

    $("#myModal").on("hidden.bs.modal", function () {
        $("#iframeYoutube").attr("src", "#");
    });
    if ( $(window).width() < 1600 ) {
        $(window).scroll(function(){
                      windowTop = $(window).scrollTop();
                      var ss =  (windowTop) * .099;
                      $('.expbusi-hand').css({
                      'top':'-'+ ss +'px'
              });
      });
} else {
       $('.expbusi-hand').css({
                      'top':'50px'
              });
                $(window).scroll(function(){
                      windowTop = $(window).scrollTop();
                      var ss =  (windowTop) * 0.2;

                      $('.expbusi-hand').css({
                      'top':''+ ss +'px'
              });
      });
     }
});



function changeVideo(vId) {
// var iframe=document.getElementById("iframeYoutube");
// iframe.src="https://www.youtube.com/embed/-IiXAQ96_x4";
   console.log($("#myModal_tutorial"));
    if(vId=='dont'){
        $('div#dontshow').removeClass('hide');
    }
    $("#myModal_tutorial").modal("show");
}

/*<!--Product slider-->*/
$('.carousel[data-type="multi"] .item').each(function () {
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < 4; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});
/*<!--Product slider--> */
$(".btn-select").each(function (e) {
    var value = $(this).find("ul li.selected").html();
    if (value != undefined) {
        $(this).find(".btn-select-input").val(value);
        $(this).find(".btn-select-value").html(value);
    }
});


$('#bs-example-navbar-collapse-1').on('shown.bs.collapse', function () {
    // alert(1);
    $('#navbar-hamburger').addClass('hidden');
    $('#navbar-close').removeClass('hidden');
}).on('hidden.bs.collapse', function () {
    $('#navbar-hamburger').removeClass('hidden');
    $('#navbar-close').addClass('hidden');
});

/*<!--nav-->	*/
$('.navbar-toggle').click(function (event) {
    event.stopPropagation();
    $('#bs-example-navbar-collapse-1').toggle();
});

$(document).ready(function () {
    var hash_link = window.location.hash;
   
    if (hash_link != '' && hash_link!='#box')
    {
        $('ul.tabs li').each(function () {
            $(this).removeClass('active');
            if ($(this).attr('rel') == hash_link.replace('#', ''))
            {
                $(this).addClass('active');
                $(this).click();
                $('.tab_content').css({'display': 'none'});
                $(hash_link).css({'display': 'block'});
            }
        });
    }
    window.onhashchange = function () {
        window.location.reload();
    }
})


$(document).click(function () {
    $('#bs-example-navbar-collapse-1').hide();
});
/*<!--nav-->				
 */


$('.panel-default').on('show.bs.collapse', function () {
    $(this).addClass('accordion-active');
});

$('.panel-default').on('hide.bs.collapse', function () {
    $(this).removeClass('accordion-active');
});

//signup btn//

$("#menu-rc").click(function () {
    $(".top-links").slideToggle("slow");
});
//signup btn//
$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var value = target.html();
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
        ul.hide();
        $(this).removeClass("active");
    } else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(500);
        $(this).addClass("active");
    }
});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});

$('#ranktoggle').click(function (event) {
    $('#view').slideToggle(1000);
    if ($('.down-arrow').hasClass('down-arrow-rotate')) {
        $('.down-arrow').removeClass('down-arrow-rotate');
    } else {
        $('.down-arrow').addClass('down-arrow-rotate');
    }
});
// tabbed content
// http://www.entheosweb.com/tutorials/css/tabs.asp
$(".tab_content").hide();
$(".tab_content:first").show();

$(".childtab_content").hide();
$(".childtab_content:first").show();

/* start credits main tab */
$("ul.main li").click(function () {

    $(".tab_content").hide();
    var activeTab = $(this).attr("rel");
    $("#" + activeTab).fadeIn();
    $("ul.main li").removeClass("active");
    $(this).addClass("active");
    $(".tab_drawer_heading").removeClass("d_active");
    $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
});
/* start credit child tab*/
$("ul.child li").click(function () {

    $(".childtab_content").hide();
    var activeTab = $(this).attr("rel");
    $("#" + activeTab).fadeIn();
    $("ul.child li").removeClass("active");
    $(this).addClass("active");
    $(".childtab_drawer_heading").removeClass("d_active");
    $(".childtab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
});
/* if in drawer mode */
$(".tab_drawer_heading").click(function () {

    $(".tab_content").hide();
    var d_activeTab = $(this).attr("rel");
    $("#" + d_activeTab).fadeIn();
    $(".tab_drawer_heading").removeClass("d_active");
    $(this).addClass("d_active");
    $("ul.main li").removeClass("active");
    $("ul.main li[rel^='" + d_activeTab + "']").addClass("active");
});

$(".childtab_drawer_heading").click(function () {

    $(".childtab_content").hide();
    var d_activeTab = $(this).attr("rel");
    $("#" + d_activeTab).fadeIn();
    $(".childtab_drawer_heading").removeClass("d_active");
    $(this).addClass("d_active");
    $("ul.child li").removeClass("active");
    $("ul.child li[rel^='" + d_activeTab + "']").addClass("active");
});


/* Extra class "tab_last" 
 to add border to right side
 of last tab */
$('ul.main li').last().addClass("tab_last");
$('ul.child li').last().addClass("tab_last");

$(function () {
    
    if (document.location.hash != '' && document.location.hash!='#box') {

        $(".tab_content").hide();
        $("ul.main li").removeClass("active");
        $(".tab_drawer_heading").removeClass("d_active");
        var tabName = window.location.hash;
        if (tabName == '#credit') {
            var activeTab = 'tab1';
            $("#" + activeTab).fadeIn();
            $('li[rel=tab1]').addClass('active');
            $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
        }
        if (tabName == '#subscription') {
            var activeTab = 'tab2';
            $("#" + activeTab).fadeIn();
            $('li[rel=tab2]').addClass('active');
            $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
            
        }
        if (tabName == '#offers') {
            var activeTab = 'tab3';
            $("#" + activeTab).fadeIn();
            $('li[rel=tab3]').addClass('active');
            $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
            var childactiveTab = 'Offerwall1';
            $(".childtab_content").hide();
            $("#" + childactiveTab).fadeIn();
            $("ul.child li").removeClass("active");
            $("li[rel^='" + childactiveTab + "']").addClass("active");
            $(".childtab_drawer_heading").removeClass("d_active");
            $(".childtab_drawer_heading[rel^='" + childactiveTab + "']").addClass("d_active");
        }
        if (tabName == '#refer') {
            var activeTab = 'tab4';
            $("#" + activeTab).fadeIn();
            $('li[rel=tab4]').addClass('active');
            $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
        }
        if (tabName == '#applydisc') {
            var activeTab = 'tab5';
            $("#" + activeTab).fadeIn();
            $('li[rel=tab5]').addClass('active');
            $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
        }
    }
        
});

$(document).ready(function () {

    var pageURL = $(location).attr("href");
    if (pageURL.indexOf("tru/ranks.php?type=city") > -1) {
        $('ul.rank-menubar-tab li a[rel=city_rank]').addClass('active');
    }
    if (pageURL.indexOf("tru/ranks.php?type=family") > -1) {
        $('ul.rank-menubar-tab li a[rel=family_rank]').addClass('active');
    }
    if (pageURL.indexOf("tru/ranks.php?type=global") > -1) {
        $('ul.rank-menubar-tab li a[rel=global_rank]').addClass('active');
    }
    if (pageURL.indexOf("tru/ranks.php?type=free") > -1) {
        $('ul.rank-menubar-tab li a[rel=free_rank]').addClass('active');
    }
    if (pageURL.indexOf("tru/ranks.php?type=supporters") > -1) {
        $('ul.rank-menubar-tab li a[rel=supporters_rank]').addClass('active');
    }
    if (pageURL.indexOf("tru/ranks.php?type=level") > -1) {
        $('ul.rank-menubar-tab li a[rel=level_rank]').addClass('active');
    }
    if (pageURL.indexOf("tru/ranks.php?type=past") > -1) {
        $('ul.rank-menubar-tab li a[rel=past_rank]').addClass('active');
    }
});


/** timer js **/
$(function () {
    var austDay = new Date();
    austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
    $('#defaultCountdown').countdown({until: austDay});
    $('#year').text(austDay.getFullYear());
});

/** responsive main menu js **/
$('.navbar-toggle').click(function (event) {
    $('#bs-example-navbar-collapse-1').toggleClass('main-menu-open');
});

$('.menu-close').click(function (event) {
    $('#bs-example-navbar-collapse-1').removeClass('main-menu-open');
});

$('body').on('click touchstart', function (evt) {
    if ($(evt.target).closest('#bs-example-navbar-collapse-1').length || $(evt.target).closest('.main-menu-open').length)
        return;
    $('#bs-example-navbar-collapse-1').removeClass('main-menu-open');
});


$(document).ready(function () {
    if ($(".js-example-basic-single").length > 0) {
        $(".js-example-basic-single").select2({
            placeholder: 'Select an option',
            minimumResultsForSearch: Infinity
        });
    }
});

/*
 Credits:
 https://github.com/marcaube/bootstrap-magnify
 */


!function ($) {

    "use strict"; // jshint ;_;


    /* MAGNIFY PUBLIC CLASS DEFINITION
     * =============================== */

    var Magnify = function (element, options) {
        this.init('magnify', element, options)
    }

    Magnify.prototype = {

        constructor: Magnify

        , init: function (type, element, options) {
            var event = 'mousemove'
                    , eventOut = 'mouseleave';
            this.type = type
            this.$element = $(element)
            this.options = this.getOptions(options)
            this.nativeWidth = 0
            this.nativeHeight = 0

            this.$element.wrap('<div class="magnify" \>');
            this.$element.parent('.magnify').append('<div class="magnify-large" \>');
            this.$element.siblings(".magnify-large").css("background", "url('" + this.$element.attr("src") + "') no-repeat");
            this.$element.parent('.magnify').on(event + '.' + this.type, $.proxy(this.check, this));
            this.$element.parent('.magnify').on(eventOut + '.' + this.type, $.proxy(this.check, this));
        }

        , getOptions: function (options) {
            options = $.extend({}, $.fn[this.type].defaults, options, this.$element.data())

            if (options.delay && typeof options.delay == 'number') {
                options.delay = {
                    show: options.delay
                    , hide: options.delay
                }
            }

            return options
        }

        , check: function (e) {
            var container = $(e.currentTarget);
            var self = container.children('img');
            var mag = container.children(".magnify-large");
            // Get the native dimensions of the image
            if (!this.nativeWidth && !this.nativeHeight) {
                var image = new Image();
                image.src = self.attr("src");
                this.nativeWidth = image.width;
                this.nativeHeight = image.height;
            } else {

                var magnifyOffset = container.offset();
                var mx = e.pageX - magnifyOffset.left;
                var my = e.pageY - magnifyOffset.top;
                if (mx < container.width() && my < container.height() && mx > 0 && my > 0) {
                    mag.fadeIn(100);
                } else {
                    mag.fadeOut(100);
                }

                if (mag.is(":visible"))
                {
                    var rx = Math.round(mx / container.width() * this.nativeWidth - mag.width() / 2) * -1;
                    var ry = Math.round(my / container.height() * this.nativeHeight - mag.height() / 2) * -1;
                    var bgp = rx + "px " + ry + "px";
                    var px = mx - mag.width() / 2;
                    var py = my - mag.height() / 2;
                    mag.css({left: px, top: py, backgroundPosition: bgp});
                }
            }

        }
    }


    /* MAGNIFY PLUGIN DEFINITION
     * ========================= */

    $.fn.magnify = function (option) {
        return this.each(function () {
            var $this = $(this)
                    , data = $this.data('magnify')
                    , options = typeof option == 'object' && option
            if (!data)
                $this.data('tooltip', (data = new Magnify(this, options)))
            if (typeof option == 'string')
                data[option]()
        })
    }

    $.fn.magnify.Constructor = Magnify

    $.fn.magnify.defaults = {
        delay: 0
    }


    /* MAGNIFY DATA-API
     * ================ */

    $(window).on('load', function () {
        $('[data-toggle="magnify"]').each(function () {
            var $mag = $(this);
            $mag.magnify()
        })
    })

}(window.jQuery);