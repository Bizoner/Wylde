/**
 * Created by gadyezra on 1/11/17.
 */

//jQuery time

var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var iterator = 0;
var step = 0;
var pickup;
var body;
var neck;
var bridge;
var email;
var private = 1;
var name;
var price = 1200;

// TODO CAROUSEL LOGIC:
// 1. Get all current parts to array of part name
// 2. Sort array according to taste
// 3. Set all images in div׳s to create the carousel
// 4. keep Iterator, clicking on right or left at carousel will trigger +1 in array
// 5. text + right side will change accordingly


var bestStyle = "Metal";
var email = "yossit@gmail.com";

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

$(document).ready(function () {
    createCarousel("carouselA");
    $(".desc h2").text($(".slick-current h2").text());
    $(".desc p").text($(".slick-current p").text());
});

$("#wizard").on("click", ".finish", function(){
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';
});

$("#wizard").on("click", ".submit", function(){
    name = document.getElementsByClassName("guitarName")[0].value;
    if (name=="")
        name = "myGuitar";
    var src = $("#popup img").attr('src');
    if (document.getElementsByClassName("public")[0].checked)
        private = 0;
    console.log(private + " " + name + " " + bridge);
    $.ajax({
        url: 'includes/call.php',
       data: {'insertGuitar' : 'insertGuitar','name' : name, 'email' : email, 'pickup' : pickup, 'neck' : neck,
              'body' : body, 'bridge' : bridge, 'private' : private, 'price' : price, 'img' : src},
       type: 'post',
       success: function (response){console.log("Success"); window.location = 'success.html'},
       error: function(xhr, status, error) {console.log("Failed + " + error + " + " + status + " + " + xhr.responseText);}
    });
});

$("#wizard").on("click", ".closePopup", function(){

    document.getElementById('overlay').style.display = 'none';
    document.getElementById('popup').style.display = 'none';
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
        case 1:{
            pickup = $(".desc h2").text();
            createCarousel("carouselB");            
            $(".desc h2").text($(".slick-current h2").text());
            $(".desc p").text($(".slick-current p").text());
            break;
        }
        case 2:{
            body = $(".desc h2").text();
            createCarousel("carouselC");
            $(".desc h2").text($(".slick-current h2").text());
            $(".desc p").text($(".slick-current p").text());
            break;
        }
        case 3:{
            neck = $(".desc h2").text();
            createCarousel("carouselD");
            $(".desc h2").text($(".slick-current h2").text());
            $(".desc p").text($(".slick-current p").text());
            break;
        }
        case 4:{
            bridge = $(".desc h2").text();
            break;
        }
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

