/**
 * Created by amaddah on 30/07/16.
 */
$(function(){
    // JS perso du site

    // Prob footer
    var docHeight = $(window).height();var footerHeight = $('footer').height();var footerTop = $('footer').position().top + footerHeight; if (footerTop < docHeight) $('footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');

});