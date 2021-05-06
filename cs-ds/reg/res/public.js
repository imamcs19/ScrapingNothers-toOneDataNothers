$(function(){

    // 手机端控制导航
    $('.Header-navclick').click(function () {
        if ($(window).width() < 1000) {
            $(".Header-searwords").slideUp(100);
        };
        if ($('.Header-navbarbox').is(':hidden')) {
            $(this).addClass('ontrue');
            $('.Header-navbarbox').slideDown(400);
        } else {
            $(this).removeClass('ontrue');
            $('.Header-navbarbox').slideUp(300);
        }
    });
    
    navHover();
    function navHover() {
        if ($(window).width() > 1000) {
            // 二级导航
            $('.Header-navbar').show();
            $('.Header-navbar ul li').hover(function () {
                $(this).find('.Header-sunNav').slideDown(300);
            }, function () {
                $(this).find('.Header-sunNav').stop(true,false).slideUp(200);
            });
        } else {   
                $(".Header-sunNavClick").click(function(){
                        var sunNavMObileWords=$(this).next(".Header-sunNav");
                        $(".Header-sunNav").slideUp(200);
                        $(".Header-sunNavClick").removeClass('ontrue');
                        if ($(sunNavMObileWords).is(':hidden')) {
                            $(this).addClass('ontrue');
                            $(sunNavMObileWords).slideDown(300);
                        } else {
                            $(this).removeClass('ontrue');
                            $(sunNavMObileWords).slideUp(200);
                        }
                    });
        }
    }

    // 手机端底部控制
    $('.Footer-navarr').bind("click", function () {
        var FnavbarWords = $(this).parents(".Footer-navclick").next('.Footer-navwords');
        $('.Footer-navwords').slideUp(300);
        $('.Footer-navarr').removeClass('ontrue');
        if ($(FnavbarWords).is(':hidden')) {
            $(this).addClass('ontrue');
            $(FnavbarWords).slideDown(300);
        } else {
            $(this).removeClass('ontrue');
            $(FnavbarWords).slideUp(300);
        }
    });
    







    widthChange();
    function widthChange(){
        var window_width = $(window).width();//获取浏览器窗口宽度

        
        if (!!window.ActiveXObject || "ActiveXObject" in window){return false;}
        // 超出设备提示
        var rberme = sessionStorage['rberme'] || '';
        if( window_width >= 2000 && rberme==''){
            //sessionStorage['rberme'] = 'www.yisiy.com';
			sessionStorage['rberme'] = '';
            var wthint = "Resizing tampilan Anda telah melampaui cakupan responsive desain! Klik OK Untuk menjaga tata letak tampilan agar tetap bagus, Setuju?";
            if (window.confirm(wthint)) {sessionStorage['rberme'] = 'winter';$("body").addClass("body-maxwidth");} else { return; }
        }
        if(rberme=='winter'){$("body").addClass("body-maxwidth");}
        }
      

    //浏览器窗口事件
    $(window).resize(function () {
        widthChange();
    });
    
    // 页面滚动轴事件
    $(window).scroll(function () {});
});


