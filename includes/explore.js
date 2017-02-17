$(document).ready(function () {
    var array = document.getElementsByClassName("plusIcon");
    for (var i=0; i<array.length; i++)
        array[i].addEventListener('click', show, false);
    
});

function closePopup(e){   
    document.getElementById("lightbox").style.display='none';

}

function show(e){
    console.log("clicked");
    name = "Wylder";
    if (name=="")
        name = "wylder";
    var creator = "yossit@gmail.com";
    $.ajax({
        url: 'includes/call.php',
       data: {'showGuitar' : 'showGuitar','name' : name, 'creator' : creator},
       type: 'post',
       success: function (response){
        console.log(response);
        var div = document.getElementsByClassName("lbcontent")[0];
        div.innerHTML = response;
        var popup = document.getElementsByClassName("closePopup")[0];
        popup.addEventListener('click', closePopup, false);
        $("#lightbox").css("display","block");
    },
       error: function(xhr, status, error) {console.log("Failed + " + error + " + " + status + " + " + xhr.responseText);}        
    });
};

$("#wizard").on("click", ".closePopup", function(){

    document.getElementById('overlay').style.display = 'none';
    document.getElementById('popup').style.display = 'none';
});