$(document).ready(function(){
    $(".owl-carousel .owl-dots").removeClass('disabled');
    $(".owl-carousel").owlCarousel({
        items:1,
        autoplay:true,
        mouseDrag: false,
        loop:true,
        autoplayTimeout:3500,
        autoplayHoverPause:true
    });


    $('.main-table-menu .tab').click(function(){
        let tab_id = $(this).attr('data-tab');

        $('.main-table-menu .tab').removeClass('current');
        $('.content').removeClass('current');

        $(this).toggleClass('current');
        $("#"+tab_id).toggleClass('current');

        $('.game-tab-matches').removeClass('current');
        $('.summary').removeClass('current');
    });

    $('.league-content-inner').click(function(){
        let tab_id = $(this).attr('data-tab');
        $("#"+tab_id).toggleClass('current');
    });
    $('.match').click(function(){
        let tab_id = $(this).attr('data-tab');
        $(this).toggleClass('current');
        $("#"+tab_id).toggleClass('current');
    });

    $('.table-games-pagination-btn').click(function(){
        let tab_id = $(this).attr('data-tab');

        $('.table-games-pagination-btn').removeClass('current');
        $('.table-games-boxes').removeClass('current');


        $(this).toggleClass('current');
        $("#"+tab_id).toggleClass('current');
    });

    $('.SeasonBtn.fiveSeason').click(function(){
        $(this).addClass('current');
        $(this).parent().find('.SeasonBtn.currentSeason').removeClass('current');
        $(this).parent().parent().find('.summary-statistics-bottom-second.fiveSeason').addClass('current');
        $(this).parent().parent().find('.summary-statistics-bottom-second.currentSeason').removeClass('current');
    });
    $('.SeasonBtn.currentSeason').click(function(){
        $(this).addClass('current');
        $(this).parent().find('.SeasonBtn.fiveSeason').removeClass('current');
        $(this).parent().parent().find('.summary-statistics-bottom-second.fiveSeason').removeClass('current');
        $(this).parent().parent().find('.summary-statistics-bottom-second.currentSeason').addClass('current');
    });


    $('.cp-header .tab').click(function(){
        let tab_id = $(this).attr('data-tab');

        $('.cp-header .tab').removeClass('current');
        $('.cp-body').removeClass('current');
        $(this).toggleClass('current');
        $("#"+tab_id).toggleClass('current');
    });


    $('.betStat-rightMenu .menuToggleIcon').click(function () {
        $('.menuToggleIcon').toggleClass('active');
        $('.betStat-userParameters').toggleClass('active');
    });

    $('.logOut').click(function () {
        let rightMenu = $('.betStat-rightMenu');
        rightMenu.removeClass('logged-in');
        rightMenu.addClass('logged-out');
        $('.betStat-userParameters').removeClass(' active');
    });


    $('.register').click(function () {
        $('#login-tab, .cp-login').removeClass('current');
        $('#register-tab, .cp-register').addClass('current');
        closePopupOuterClick();
        $('.client-popup-overlay').show();
    });
    $('.logIn').click(function () {
        $('#register-tab, .cp-register').removeClass('current');
        $('#login-tab, .cp-login').addClass('current');
        $('.client-popup-overlay').show();
        closePopupOuterClick();
    });
    $('.cp-close').click(function () {
        $('.client-popup-container').hide();
    });

    $('.logIn, .register').click(function () {
        $('.client-popup-container').show();
        $('.client-popup').show();
    });

    function closePopupOuterClick() {
        $(document).mouseup(function(e){
            let searchObject = $('.client-popup');
            if(!searchObject.is(e.target) && searchObject.has(e.target).length === 0){
                searchObject.hide();
                $('.client-popup-overlay').hide();
            }
        });
    }

    $('.leagueToggle').on('change', e => {
        const allCheckedBoxes = $('.leagueToggle:checked');
        $(`.league-content-football`).removeClass('current');
        allCheckedBoxes.each((i, el) => {
            $(`.league-content-football.${el.id}`).addClass('current');
        })
    })
    $('.leagueToggle1').on('change', e => {
        const allCheckedBoxes = $('.leagueToggle1:checked');
        $(`.league-content-basketball`).removeClass('current');
        allCheckedBoxes.each((i, el) => {
            $(`.league-content-basketball.${el.id}`).addClass('current');
        })
    })
    $('.leagueToggle2').on('change', e => {
        const allCheckedBoxes = $('.leagueToggle2:checked');
        $(`.league-content-tennis`).removeClass('current');
        allCheckedBoxes.each((i, el) => {
            $(`.league-content-tennis.${el.id}`).addClass('current');
        })
    })

    $('.forgotPassLink').on('click', function (){
        $('.loginPopup').hide();
        $('.forgotPasswordPopup').show();
    });

    $('.client-popup-button.send-mail').on('click', function (){
        $('.forgotPasswordPopup').hide();
        $('.successPopupMsg').show();
    });




    //passCheckJs



    //endPassCheckJs



    //add JS Class active on page refresh
    $(".betStat-navBar ul a")
        .click(function(e) {
            var link = $(this);

            var item = link.parent("li");

            if (item.hasClass("active")) {
                item.removeClass("active");
            } else {
                item.addClass("active");
            }

            if (item.children("ul").length > 0) {
                var href = link.attr("href");
                link.attr("href", "#");
                link.attr("href", href);
                e.preventDefault();
            }
        })
        .each(function() {
            var link = $(this);
            if (link.get(0).href === location.href) {
                link.addClass("active");
                return false;
            }
        });
    //End JS of add Class active on page refresh


    if ($('.news-categories-boxes a').length < 9){
        $('.news-btn').hide();
    } else  {
        $('.news-btn').show();
    }
    if ($('.promotions-boxes a').length < 9){
        $('.promotions-button').hide();
    } else  {
        $('.promotions-button').show();
    }

});
