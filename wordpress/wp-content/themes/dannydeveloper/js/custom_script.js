//jQuery for wordpress
jQuery(document).ready(function () {
    $(window).scroll(function () { 
        if (window.pageYOffset > 0) {
            $('#main-nav-header').addClass('collapsed');
        } else {
            $('#main-nav-header').removeClass('collapsed');
        }
    });
    $('#menu-main-menu li').hover(function () {
            var id = '#'+$(this).attr('id');
            $(id + ' .sub-menu').show();
            
        }, function () {
            var id = '#'+$(this).attr('id');
            $(id + ' .sub-menu').hide();
        }
    );
});