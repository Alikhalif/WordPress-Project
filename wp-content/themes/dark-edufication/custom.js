jQuery(document).ready(function($) {

    var topheader_dropdown = $('.topheader-dropdown');
    var contact_info = $('.contact-info');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');

    /*--------------------------------------------------------------
     Keyboard Navigation
    ----------------------------------------------------------------*/

    if( $(window).width() < 1260 ) {
            $('#top-header .social-icons').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#top-header').find('button.topheader-dropdown').focus();
                }
            });
        }
        else {
            $( '#top-header .social-icons li:last-child' ).unbind('keydown');
        }

        $(window).resize(function() {
            if( $(window).width() < 1260 ) {
                $('#top-header .social-icons').find("li").last().bind( 'keydown', function(e) {
                    if( e.which === 9 ) {
                        e.preventDefault();
                        $('#top-header').find('.button.topheader-dropdown').focus();
                    }
                });
            }
            else {
                $( '#top-header .social-icons li:last-child' ).unbind('keydown');
            }
        });
        
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

    topheader_dropdown.on('keydown', function (e) {
        var tabKey    = e.keyCode === 9;
        var shiftKey  = e.shiftKey;

        if( topheader_dropdown.hasClass('active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                contact_info.slideUp();
                $('.main-navigation').removeClass('menu-open');
                $('.menu-overlay').removeClass('active');
                topheader_dropdown.removeClass('active');
            };
        }
    });

    var myElement = document.getElementById("edufication_subscribe_section");
    
    if(myElement){
        var input_date = $( '#courses-timer' ).data( 'countdown' );

        // Set the date we're counting down to
        var countDownDate = new Date( input_date ).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();
            
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Output the result in an element with id="demo"
            document.getElementById("courses-timer").innerHTML = "<span>" + days + "<small>days</small>" + "</span>" + "<span>" + hours + "<small>hours</small>" + "</span>"
            + "<span>" + minutes + "<small>minutes</small>" + "</span>" + "<span>" + seconds + "<small>seconds</small>" + "</span>";
            
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("courses-timer").innerHTML = "Released";
            }
        }, 1000);
    }

  


/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});