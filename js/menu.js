(function($) {
var adjustLayout = function() {
    if ($(window).width() < 1024){
        $('html').addClass('mobile');
        $('.headerDesktop').hide();
        $('.headerMobile').show();
    }else{
        $('html').removeClass('mobile');
        $('.headerDesktop').show();
        $('.headerMobile').hide();
    } 
};

$(function() {
    adjustLayout();
});

$(window).on('resize', function() {
    adjustLayout();
});

$( ".menuButton" ).click(function() {
    $( 'header' ).toggleClass( "menuOpen___1Shr4" );
    $( this ).toggleClass( "close___Bnfds" );
    $( '.menu___2rx8O' ).toggleClass( "open___175rI" );
    $('html').toggleClass("scroll-disabled");
    $('.navigation___2JT4F').toggleClass("menuOpen");
});

$( ".searchButton___tSQCD" ).click(function() {
    $( 'header' ).toggleClass( "sticky___w5zBW" );
});

$(".panel__scroll___Dp-_L").css("height", $(window).height());
$(window).resize(function(){
    var height = $(window).height();
    $(".panel__scroll___Dp-_L").css("height", $(window).height());
});

$( ".primaryNav__list___1wlmQ a" ).click(function(event) {
    if(!$(this).hasClass('link__')) { 
        event.preventDefault();    
    }
    
    if ($('html').hasClass('mobile')){
        $('.navigation__content').css({transform: 'translateX(-100%)'});
        $( '.headerMobile__prev' ).removeClass( "hidden" );
        $( '.headerMobile__search' ).addClass( "hidden" ); 
        
        $( '.headerMobile__menu .menuButton' ).addClass( "secondary" ); 

        var level_ = $('.navigation__content').attr("data-menu__level"); 
    
        $('.navigation__content').attr('data-menu__level','1');
    }

    $('li.primaryNavItem___1k6aC').removeClass('isActive___gUaUu');
    $(this).parent('li').addClass('isActive___gUaUu');
 
    var menu_number = $(this).parent('li').index();
    $( ".navigation__secondary___13rln .panel__nav___3mAkk .panel___3-Osv" ).fadeOut("fast");
    $( ".navigation__secondary___13rln .panel__nav___3mAkk .panel___3-Osv" ).eq( menu_number ).fadeIn("fast");
});

$( ".panel__secondary___10KZU .secondaryNav__list___24U7o a" ).click(function(event) {
    event.preventDefault();

    if ($('html').hasClass('mobile')){
        $('.navigation__content').css({transform: 'translateX(-200%)'});
        $('.navigation__content').attr('data-menu__level','2');
    }

    var menu_number = $(this).closest('li').index();
    console.log(menu_number);
    
    $(this).closest('.panel__row___3VXuW').find('.panel__scroll___Dp-_L div .menu__container').fadeOut("fast");
    $(this).closest('.panel__row___3VXuW').find('.panel__scroll___Dp-_L div .menu__container').eq( menu_number ).fadeIn("fast");
    
});

$( ".headerMobile__menu .menuButton" ).click(function() {
    $( '.headerMobile__content' ).toggleClass( "dark" );
    //$( this ).toggleClass( "close___Bnfds" );
    $( '.headerMobile__logo' ).toggleClass( "hidd" );
    $( '.headerMobile__search' ).toggleClass( "hidden" );  
});


$( ".headerMobile__prev" ).click(function() {
    var level_ = $('.navigation__content').attr("data-menu__level"); 
        console.log(level_);
    
    if (level_==1){
        $('.navigation__content').css({transform: 'translateX(0)'});
        $('.navigation__content').attr('data-menu__level','0');
        $( '.headerMobile__search' ).removeClass( "hidden" );
        $( '.headerMobile__prev' ).addClass( "hidden" );
        $( '.headerMobile__menu .menuButton' ).removeClass( "secondary" );  
    }
    if (level_==2){
        $('.navigation__content').css({transform: 'translateX(-100%)'});
        $('.navigation__content').attr('data-menu__level','1');
    }
    
});

$( ".headerMobile__search" ).click(function() {
    $( this ).toggleClass( "open" );
    $('input.autocomplete__input').focus();
    $( ".autocomplete__inputWrapper" ).toggleClass( "autocomplete__inputWrapperEnabled" );
    $( ".autocomplete.compact" ).toggleClass( "hasFocus searchOpen" );   
});
})( jQuery );
