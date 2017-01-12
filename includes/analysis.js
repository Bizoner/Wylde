/**
 * Created by gadyezra on 1/12/17.
 */
$(document).ready(function() {

    $("input").keyup(function (){
        if ($("input").val().length!=0) {
            $("#add").css({"display": "initial"});
        }
        else {
            $("#add").css({"display": "none"});
        }
    });

    $("#analysis").on("click", "span", function(){
        $("#artists").append('<section class="artist"><a href="#" class="cancel"></a>'+ $("input").val() +'</section>');
    });
});


$("#artists").on("click",".artist a", function () {
    var to_delete = $(this).parent();
    to_delete.fadeOut(450, function (){
        to_delete.remove();
    });
});
