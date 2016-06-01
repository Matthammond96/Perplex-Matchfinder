$(document).ready(function() {
    var leftPos = 0;
    var counter = 1;
    var newHeight = $("#newArticle").height();
    var newsPara = $('#newsPara').height();
    var newAuthor = $('#newsAuthor').height();
    
    $(".newsContainer").css('height', newsPara + newAuthor + newHeight * 2.5);
    
    $(".news").each(function() {
        $(this).css("left", leftPos); 
        leftPos += $(window).width();
    });
    
    $("#next").click(function() {
        var windowWidth = $(document).width();
        
        if (counter < 3) {
        counter ++;
            $(".news").animate({
                left: '-=' + windowWidth
            },500);
        }
    });
    
    $("#previous").click(function() {
        var windowWidth = $(window).width();
        
        if (counter > 1) {
            counter--;
            $(".news").animate({
                left: '+=' + windowWidth
            },500);
        }
    });
})

$(window).resize(function() {
    var newHeight = $("#newArticle").height();
    var newsPara = $('#newsPara').height();
    var newAuthor = $('#newsAuthor').height();
    
    $(".newsContainer").css('height', newsPara + newAuthor + newHeight * 2.5);
})