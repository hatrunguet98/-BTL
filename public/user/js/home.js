$(document).ready(function() {
    var header = document.querySelector('.header');
    var origOffsetY = header.offsetTop;

    function onScroll(e) {
        window.scrollY >= 10 ? header.classList.add('scroll') : header.classList.remove('scroll');
    }
    document.addEventListener('scroll', onScroll);
    $("#class-survey").click(function() {
        if (document.getElementById("list-survey").style.display == "none") {
            document.getElementById("list-survey").style.display = "";
        } else {
            document.getElementById("list-survey").style.display = "none";
        }
    });
    $("#class-survey-mobile").click(function() {
        if (document.getElementById("list-survey-mobile").style.display == "none") {
            document.getElementById("list-survey-mobile").style.display = "";
        } else {
            document.getElementById("list-survey-mobile").style.display = "none";
        }
    });
    // $("#name-courses").hover(function() {
    //     if (document.getElementById("name-course").style.display == "none") {
    //         document.getElementById("name-course").style.display = "";
    //     } else {
    //         document.getElementById("name-course").style.display = "none";
    //     }
    // });
    $(function(){
        $(window).scroll(function () {
        if ($(this).scrollTop() > 100) $(".lentop").fadeIn();
        else $(".lentop").fadeOut();
        });
        $(".lentop").click(function () {
        $("body,html").animate({scrollTop: 0}, "slow");
        });
    });
});
