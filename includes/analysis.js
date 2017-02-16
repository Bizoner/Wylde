/**
 * Created by gadyezra on 1/12/17. Edited by Eldad Corem on 16/02/2017
 */

 function bodyLoad(){
    if (!sessionStorage.getItem("email"))
        window.location="index.html";
    else{
        $.ajax({
               url: 'includes/call.php',
               data: {'login' : sessionStorage.getItem('email')},
               type: 'post',
               async:false,
               success: function (response){
                        console.log("Success");
                        callbackResponse(response);
                    },
               error: function(xhr, status, error) {console.log("Failed + " + error + " + " + status + " + " + xhr);}
            });
    }
 }

function callbackResponse(data){
        var index = data.indexOf("$");
        var fullname = data.substring(0, index);
        var src = data.substring(index+1);
        sessionStorage.setItem("fullname", fullname);
        sessionStorage.setItem("src", src);
        var picture = document.getElementById("profilePic");
        var usrName = document.getElementById("profileName");
        src = "url('" + sessionStorage.getItem("src") + "')";
        picture.style.background = src;
        usrName.innerHTML = sessionStorage.getItem("fullname");
}

$(document).ready(function() {

    $.getJSON( "includes/json/bands.json", function( data ) {
        console.log( "JSON Data: " + data);
        mybands = data;
        $.each( data, function( key, val ) {
            $("#artists").append('<section class="artist"><a href="#" class="cancel"></a>'+ val.artist +'</section>');
        });
    });


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
        $("input").val("");
        $("#add").css({"display": "none"});
    });
});



$("#addbands").autocomplete({
    source: [ "Metallica", "Led Zeppelin", "Iron Maiden", "QOTSA", "Arctic Monkeys", "Incubus", "Blink 182" ]
});


$("#artists").on("click",".artist a", function () {
    var to_delete = $(this).parent();
    var text = to_delete[0].textContent;
    console.log(text);
    to_delete.fadeOut(450, function (){
        to_delete.remove();
    });
    var filtered = mybands.filter(function(item) {
        return item.artist !== text;
    });
    mybands = filtered;
});

