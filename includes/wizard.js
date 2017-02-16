/**
 * Created by gadyezra on 1/11/17.
 */

//jQuery time

var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var iterator = 0;
var step = 0;

// TODO CAROUSEL LOGIC:
// 1. Get all current parts to array of part name
// 2. Sort array according to taste
// 3. Set all images in div׳s to create the carousel
// 4. keep Iterator, clicking on right or left at carousel will trigger +1 in array
// 5. text + right side will change accordingly

var parts = [];


var bestStyle = "Heavy Metal";

 function bodyLoad(){
    if (!sessionStorage.getItem("email"))
        window.location="index.html";
    else{
        $.ajax({
               url: 'includes/call.php',
               data: {'buildGuitar' : 'buildGuitar'},
               type: 'post',
               dataType: 'JSON',
               success: function (response){
                        console.log("Success");
                        callbackResponse(response);
                    },
               error: function(xhr, status, error) {console.log("Failed + " + error + " + " + status + " + " + xhr);}
            });
    }
 }

function callbackResponse(data){
    //Here we'll update the pars[] data
    console.log(data);
    document.getElementById("wizard").style.visibility="visible";
}

function moveSelectedFirst(array) {
    var i = 0;
    while (i < array.length) {
        if (array[i].style == bestStyle) {
            break;
        }
        i++;
    }
    var index = i;
    var temp = array[0];
    array[0] = array[index];
    array[index] = temp;
    return array;
};


function createCarousel(classname) {
    $("." + classname).slick({
        centerMode: true,
        centerPadding: '30px',
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
};

function initFirstCarousel() {
    for (var i = 0; i < parts[0].length; i++) {
        $(".twothirdCol .carouselA").append('<div><img src="' + parts[0][i].img + '"></div>');
    }
    $(".desc h2").text(parts[0][0].title);
    $(".desc p").text(parts[0][0].description);
    $("#builder section:nth-child("+step+2+") .item_title").html(parts[0][0].title);
    $("#builder section:nth-child("+step+2+") .item_thumb").css("background-image", "url(" + parts[0][0].img + ")");
    $("#builder section:nth-child("+step+2+") .item_price").html(parts[0][0].price+"$");
    return "carouselA";
};

function initSecondCarousel() {
    for (var i = 0; i < parts[1].length; i++) {
        $(".twothirdCol .carouselB").append('<div><img src="' + parts[1][i].img + '"></div>');
    }
    $(".desc h2").text(parts[1][0].title);
    $(".desc p").text(parts[1][0].description);
    $("#builder section:nth-child("+step+2+") .item_title").html(parts[1][0].title);
    $("#builder section:nth-child("+step+2+") .item_thumb").css("background-image", "url(" + parts[1][0].img + ")");
    $("#builder section:nth-child("+step+2+") .item_price").html(parts[1][0].price+"$");
    return "carouselB";
};

function initThirdCarousel() {
    for (var i = 0; i < parts[2].length; i++) {
        $(".twothirdCol .carouselC").append('<div><img src="' + parts[2][i].img + '"></div>');
    }
    $(".desc h2").text(parts[2][0].title);
    $(".desc p").text(parts[2][0].description);
    $("#builder section:nth-child("+step+2+") .item_title").html(parts[2][0].title);
    $("#builder section:nth-child("+step+2+") .item_thumb").css("background-image", "url(" + parts[2][0].img + ")")
    $("#builder section:nth-child("+step+2+") .item_price").html(parts[2][0].price+"$");;
    return "carouselC";
};

function initFourthCarousel() {
    for (var i = 0; i < parts[3].length; i++) {
        $(".twothirdCol .carouselD").append('<div><img src="' + parts[3][i].img + '"></div>');
    }
    $(".desc h2").text(parts[3][0].title);
    $(".desc p").text(parts[3][0].description);
    $("#builder section:nth-child("+step+2+") .item_title").html(parts[3][0].title);
    $("#builder section:nth-child("+step+2+") .item_thumb").css("background-image", "url(" + parts[3][0].img + ")");
    $("#builder section:nth-child("+step+2+") .item_price").html(parts[3][0].price+"$");
    return "carouselD";

};


$(document).ready(function () {
    // INITILIZE FIRST
    parts[0] = moveSelectedFirst(parts[0]);
    // INITILIZE REST
    for (var i = 1; i < parts.length; i++) {
        parts[i] = moveSelectedFirst(parts[i]);
    }
    createCarousel(initFirstCarousel("carouselA"));

    $(".twothirdCol").on("click",".slick-next",function () {
        iterator++;
        if (iterator == parts[step].length) {
            iterator = 0;
        }
        $(".desc h2").text(parts[step][iterator].title);
        $(".desc p").text(parts[step][iterator].description);
        $(".slick-next").css("pointer-events", "none");
        $("#builder section:nth-child("+step+2+") .item_title").html(parts[step][iterator].title);
        $("#builder section:nth-child("+step+2+") .item_thumb").css("background-image", "url(" + parts[step][iterator].img + ")");
        $("#builder section:nth-child("+step+2+") .item_price").html(parts[step][iterator].price+"$");
        setTimeout(function () {
            $(".slick-next").css("pointer-events", "auto");
        }, 500)
    });
    $(".slick-prev").click(function () {
        iterator--;
        if (iterator == -1) {
            iterator = parts[step].length - 1;
        }
        $(".desc h2").text(parts[step][iterator].title);
        $(".desc p").text(parts[step][iterator].description);
        $(".slick-prev").css("pointer-events", "none");
        $("#builder section:nth-child("+step+2+") .item_title").html(parts[step][iterator].title);
        $("#builder section:nth-child("+step+2+") .item_thumb").css("background-image", "url(" + parts[step][iterator].img + ")");
        $("#builder section:nth-child("+step+2+") .item_price").html(parts[step][iterator].price+"$");
        setTimeout(function () {
            $(".slick-prev").css("pointer-events", "auto");
        }, 500)

    });
});

$("#wizard").on("click",".next", function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent().parent();
    next_fs = $(this).parent().parent().next();
    step++;
    //activate next step on progressbar using the index of next_fs
    // $("#progressbar li").eq($("section").index(current_fs)).addClass("active");
    $("#progressbar li").eq($("#wizard section").index(next_fs)).addClass("active");
    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'width': '45%',
                'position': 'absolute'
            });
            next_fs.css({'left': left, 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });

    var current_title = $(".desc h2").html();

    if (step<4) {
        $("#builder section").append('<div class="item"><div class="item_thumb"></div> <div class="item_title">' + current_title + '</div><div class="item_price">438$</div></div>');
    }


    switch (step) {
        case 1:
            createCarousel(initSecondCarousel("carouselB"));
            break;
        case 2:
            createCarousel(initThirdCarousel("carouselC"));
            break;
        case 3:
            createCarousel(initFourthCarousel("carouselD"));
            break;
    }

});


$(".previous").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("section").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {

            scale = 0.8 + (1 - now) * 0.2;
            left = ((1 - now) * 50) + "%";
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".submit").click(function () {
    return false;
});

