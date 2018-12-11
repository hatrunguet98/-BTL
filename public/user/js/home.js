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
});