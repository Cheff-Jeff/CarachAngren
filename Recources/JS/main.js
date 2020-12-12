let popup = false;
let scroll = false;

$(document).ready(function(){
    $('a[href="https://www.backstagerockshop.com/collections/carach-angren"]').attr('target', '_blank');

    // Hide Header on on scroll down
    let headerTop = $("header");
    let Scroll;
    let lastScrollTop = 0;
    let delta = 5;
    let navbarHeight = 0;

    $(window).scroll(function () {
        Scroll = true;
    });

    setInterval(function () {
        if (Scroll) {
            hasScrolled();
            Scroll = false;
        }
    }, 250);

    function hasScrolled() {
        let st = $(this).scrollTop();
        if (Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st > lastScrollTop && st > navbarHeight) {
            $(headerTop).removeClass('active').addClass('hide');
        } else {
            if (st + $(window).height() < $(document).height()) {
                $(headerTop).removeClass('hide').addClass('active');
            }
        }
        lastScrollTop = st;
    }
    // end Hide Header on on scroll down
    //open album popup
    $('.releas-wrap').click(function(){
        let img = $(this).find('img');
        img = img[0]['src'];

        let name = $(this).find('.name');
        name = name[0]['innerHTML'];
        
        let date = $(this).find('.date');
        date = date[0]['innerHTML'];
        
        let details = $(this).find('.details');
        details = details[0]['innerHTML'];

        $('#releas-popup').addClass('active');
        $('.overlay').addClass('active');
        $('body').addClass('album');
        $('#releas-popup .inner-img img')[0]['src'] = img;
        $('#releas-popup .inner-name span')[0]['innerHTML'] = date;
        $('#releas-popup .inner-details')[0]['innerHTML'] = details;
        // $('#releas-popup .inner-name p')[0]['innerHTML'] = name;
        setTimeout(function(){ 
            popup = true; 
        }, 5);
    });
    //close album popup
    $('.close-popup').click(function(){
        close()
    });
    //scroll animation navigation
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
    // On-page links
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && location.hostname == this.hostname) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        scroll = true
        $('html, body').animate({
            scrollTop: target.offset().top - 70
        }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
            return false;
            } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
            scroll = false
            };
        });
        }
    }
    });
    //scroll spy
    $(window).bind('scroll', function() {
        if(!scroll){
            var currentTop = $(window).scrollTop();
            var elems = $('.section');
            elems.each(function(index){
                var elemTop 	= $(this).offset().top;
                var elemBottom 	= elemTop + $(this).height();
                if(currentTop >= elemTop && currentTop <= elemBottom){
                    var id 		= $(this).attr('id');
                    var navElem = $('a[href="/#' + id+ '"]');
                    if(id == 'home'){
                        navElem = $('a[href="/"]');
                    }else if(id == 'shop'){
                        navElem = $('a[href="https://www.backstagerockshop.com/collections/carach-angren"]');
                    }
                    navElem.parent().addClass('active').siblings().removeClass( 'active' );
                }
            })
        }
    }); 
    //menu active
    $('.MenuItem').click(function(){
        $('.MenuItem').removeClass('active');
        $(this).addClass('active');
    });

    $('.hamburger').click(function(){
        $(this).toggleClass('open');
        $('header').toggleClass('openMenu');
        $('body').toggleClass('openMenu');
    });
    $('.header-overlay').click(function() {
        $('.hamburger').removeClass('open');
        $('header').removeClass('openMenu');
        $('body').removeClass('openMenu');
    });
    $('.MenuItem').click(function() {
        if($(window).width() < 991) {
            $('.hamburger').removeClass('open');
            $('header').removeClass('openMenu');
            $('body').removeClass('openMenu');
        }
    });
}); 

//close album popup
window.addEventListener('click', function(e){
    if(popup){
        if (document.getElementById('PopBox').contains(e.target)){
        } else{
            close(); 
        }
    }
});

function close(){
    let img = "";
    let name = "";
    let date = "";
    let details = "";

    $('#releas-popup').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').removeClass('album');
    $('#releas-popup .inner-img img')[0]['src'] = img;
    $('#releas-popup .inner-name span')[0]['innerHTML'] = date;
    $('#releas-popup .inner-details')[0]['innerHTML'] = details;
    popup = false;
}