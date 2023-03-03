jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader = $('#loader');
    var loader_container = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');
    var latest_news_slider = $('.latest-news-slider');
    var clients_slider = $('.clients-slider');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    $('.topheader-dropdown').click(function() {
        $(this).toggleClass('active');
        $('.contact-info').slideToggle();
    });

    $(document).click(function (e) {
        var container = $("#top-header");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.topheader-dropdown').removeClass('active');
            $('.contact-info').slideUp();
        }
    });

    menu_toggle.click(function(){
        nav_menu.slideToggle();
        $(this).toggleClass('active');
       $('.main-navigation').toggleClass('menu-open');
       $('.menu-overlay').toggleClass('active');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#site-navigation').removeClass('menu-open');
            $('#primary-menu').slideUp();
            $('.menu-overlay').removeClass('active');
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        if ($(this).scrollTop() > 50) {
            $('.menu-sticky #masthead').css({ 'box-shadow' : '0 1px rgba(34, 34, 34, 0.1)' });
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
            $('.menu-sticky #masthead').css({ 'box-shadow' : 'none' });
        }
    });

   if ($(window).width() < 1024) {
        $( ".nav-menu ul.sub-menu li:last-child" ).focusout(function() {
            dropdown_toggle.removeClass('active');
            $('.main-navigation .sub-menu').slideUp();
        });
    }

/*------------------------------------------------
            SLICK SLIDER
------------------------------------------------*/

    latest_news_slider.slick();
    clients_slider.slick({
        responsive: [
            {
                breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
            {
                breakpoint: 767,
                    settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

/*------------------------------------------------
            MATCH HEIGHT
------------------------------------------------*/

$('#courses-section article .courses-wrapper').matchHeight();
$('.client-item-wrapper').matchHeight();
$('#our-team article .entry-title').matchHeight();
$('.blog-item-wrapper').matchHeight();
$('.blog-item-wrapper .entry-title').matchHeight();

/*------------------------------------------------
            LIST AND GRID VIEW
------------------------------------------------*/
$('.list-view').click(function() {
    $('body').removeClass('post-grid-view').addClass('post-list-view');
    $('#courses-section article .courses-wrapper').matchHeight();
});

$('.grid-view').click(function() {
    $('body').removeClass('post-list-view').addClass('post-grid-view');
    $('#courses-section article .courses-wrapper').matchHeight();
});

$('ul.tabs.tp-education-search-tabs li a').click(function(event) {
    event.preventDefault();
});

/*------------------------------------------------------------
            ARCHIVE DROPDOWN
-------------------------------------------------------------*/
// localized site url
var current_site = data.current_site;

// Class Category
$( '#filter-posts-category select#tp-class-category' ).change( function(){

    var cat_slug = this.value;
    var new_path = current_site + '/tp-class-category/' + cat_slug;

    // url location
    if ( cat_slug != '' ) {
        location.replace( new_path );
    }
    
});

// course Category
$( '#filter-posts-category select#tp-course-category' ).change( function(){

    var cat_slug = this.value;
    var new_path = current_site + '/tp-course-category/' + cat_slug;

    // url location
    if ( cat_slug != '' ) {
        location.replace( new_path );
    }
    
});

// event Category
$( '#filter-posts-category select#tp-event-category' ).change( function(){
    var cat_slug = this.value;
    var new_path = current_site + '/tp-event-category/' + cat_slug;

    // url location
    if ( cat_slug != '' ) {
        location.replace( new_path );
    }
    
});

// excursion Category
$( '#filter-posts-category select#tp-excursion-category' ).change( function(){
    var cat_slug = this.value;
    var new_path = current_site + '/tp-excursion-category/' + cat_slug;

    // url location
    if ( cat_slug != '' ) {
        location.replace( new_path );
    }
    
});

// affiliation Category
$( '#filter-posts-category select#tp-affiliation-category' ).change( function(){
    var cat_slug = this.value;
    var new_path = current_site + '/tp-affiliation-category/' + cat_slug;

    // url location
    if ( cat_slug != '' ) {
        location.replace( new_path );
    }
    
});

// team Category
$( '#filter-posts-category select#tp-team-category' ).change( function(){
    var cat_slug = this.value;
    var new_path = current_site + '/tp-team-category/' + cat_slug;

    // url location
    if ( cat_slug != '' ) {
        location.replace( new_path );
    }
    
});

/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });
}
else {
    $( '#primary-menu li:last-child' ).unbind('keydown');
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $( '#primary-menu li:last-child' ).unbind('keydown');
    }
});

menu_toggle.on('keydown', function (e) {
    var tabKey    = e.keyCode === 9;
    var shiftKey  = e.shiftKey;

    if( menu_toggle.hasClass('active') ) {
        if ( shiftKey && tabKey ) {
            e.preventDefault();
            nav_menu.slideUp();
            $('.main-navigation').removeClass('menu-open');
            $('.menu-overlay').removeClass('active');
            menu_toggle.removeClass('active');
        };
    }
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});