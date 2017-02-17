$(document).ready(function () {
    var array = document.getElementsByClassName("plusIcon");
    for (var i=0; i<array.length; i++)
        array[i].addEventListener('click', show, false);
    
});

function closePopup(e){   
    document.getElementById("lightbox").style.display="none";

}

function orderGuitar(e){
    document.getElementById("lightbox").style.display="none";
    name = "Wylder";
    var creator = "yossit@gmail.com";
    $.ajax({
        url: 'includes/call.php',
       data: {'orderGuitar' : 'orderGuitar','name' : name, 'creator' : creator},
       type: 'post',
       success: function (response){console.log("success");},
       error: function(xhr, status, error) {console.log("Failed + " + error + " + " + status + " + " + xhr.responseText);}        
    });
}

function shareGuitar(e){
    var link = "order.php?guitarName=wylder&creator=yossit@gmail.com";
    $.ajax({
        url: 'includes/call.php',
       data: {'mailto' : 'eldad7@gmail.com','link' : link},
       type: 'post',
       success: function (response){console.log("success");},
       error: function(xhr, status, error) {console.log("Failed + " + error + " + " + status + " + " + xhr.responseText);}        
    });
}

function show(e){
    console.log("clicked");
    name = "Wylder";
    if (name=="")
        name = "wylder";
    var creator = "yossit@gmail.com";
    $("#lightbox").css("display","block");
    $.ajax({
        url: 'includes/call.php',
       data: {'showGuitar' : 'showGuitar','name' : name, 'creator' : creator},
       type: 'post',
       success: function (response){
        var div = document.getElementsByClassName("lbcontent")[0];
        div.innerHTML = response;
        var popup = document.getElementsByClassName("closePopup")[0];
        popup.addEventListener('click', closePopup, false);
        var share = document.getElementsByClassName("share")[0];
        share.addEventListener('click', shareGuitar, false);
        var order = document.getElementsByClassName("order")[0];
        order.addEventListener('click', orderGuitar, false);
    },
       error: function(xhr, status, error) {console.log("Failed + " + error + " + " + status + " + " + xhr.responseText);}        
    });
};

$("#wizard").on("click", ".closePopup", function(){

    document.getElementById('overlay').style.display = 'none';
    document.getElementById('popup').style.display = 'none';
});