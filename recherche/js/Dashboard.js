
$(document).ready(function() {
    $('#menu_icon').click(function() {
        if ($('.page-sidebar').hasClass('expandit')){
            $('.page-sidebar').addClass('collapseit');
            $('.page-sidebar').removeClass('expandit');
            $('.profile-info').addClass('short-profile');
            $('.logo-area').addClass('logo-icon');
            $('#main-content').addClass('sidebar_shift');
            $('.menu-title').css("display", "none");
        } else {
            $('.page-sidebar').addClass('expandit');
            $('.page-sidebar').removeClass('collapseit');
            $('.profile-info').removeClass('short-profile');
            $('.logo-area').removeClass('logo-icon');
            $('#main-content').removeClass('sidebar_shift');
            $('.menu-title').css("display", "inline-block");
        }
    });

});


var rangeSlider = function(){
    var slider = $('.range-slider'),
        range = $('.range-slider__range'),
        value = $('.range-slider__value');

    slider.each(function(){

        value.each(function(){
            var value = $(this).prev().attr('value');
            $(this).html(value);
        });

        range.on('input', function(){
            $(this).next(value).html(this.value);
        });
    });
};






