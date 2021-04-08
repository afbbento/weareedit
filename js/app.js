(function($) {

  $(".js-accordion-title").click(function () {
    $(".open").not(this).removeClass("open").next().slideUp(300);
    $(this).toggleClass("open").next().slideToggle(300);
  });



$(document).on("click", function(event){
    var $trigger = $(".headerDesktop__search");
    if($trigger !== event.target && !$trigger.has(event.target).length){
        $(".headerDesktop___ciLPx").removeClass("sticky___w5zBW");
    }            
});

$('.info_bar_container .cols.drop').on("click", function(event){
    var target = $( event.target );
    $( this ).find('.drop-inner').fadeToggle( "fast", "linear" );
    $( this ).addClass("open");
});

$(document).mouseup(function(e) 
{
    var container = $('.info_bar_container .cols.drop.open');
    
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {   
        var remove_open = $('.info_bar_container .cols.drop');
        $( remove_open ).removeClass("open");
    
        container.find('.drop-inner').hide( "fast", "linear" );
    }

});

$(document).mouseup(function(e) 
{
    var container = $('.side-filter');
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {   
        var remove_open = $('.side-filter-container');
        if (remove_open.hasClass('open')){
            $( 'html' ).removeClass("scroll-disabled");
        }    
        $( remove_open ).removeClass("open");

    }
});


$('.filter-select .select-location').on("click", function(event){
    
    $( '.side-filter-container' ).addClass("open");
    $( 'html' ).toggleClass("scroll-disabled");
});

$('.side-filter .close').on("click", function(event){
    $( 'html' ).toggleClass("scroll-disabled");
    $( '.side-filter-container' ).removeClass("open");
});


$( ".get-filter" ).click(function() {
    //$( "#filter-locations" ).submit();
    var str = $( "form" ).serializeArray();
    
    console.log(str);
    jQuery.each(str, function(i, field){
        
        if (field.name=='location'){
            if (field.value!=''){
                $('.select-location').html(field.value);
                $('.select-location').removeClass('unselected');

                //TODO Get filtered Results
            
            }else{
                $('.select-location').addClass('unselected');
            }
        }
        
   });

    var remove_open = $('.side-filter-container');
    $( remove_open ).removeClass("open");
    $( 'html' ).removeClass("scroll-disabled"); 
    
});

})( jQuery );