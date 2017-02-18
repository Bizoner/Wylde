$(document).ready(function() {
	var link = document.getElementById("selection").childNodes[1].childNodes[1];
	link.addEventListener('click', hiddenForm, false);
	var link = document.getElementById("selection").childNodes[1].childNodes[3];
	link.addEventListener('click', hiddenForm, false);
	var link = document.getElementById("selection").childNodes[3].childNodes[1];
	link.addEventListener('click', hiddenForm, false);
	var link = document.getElementById("selection").childNodes[3].childNodes[3];
	link.addEventListener('click', hiddenForm, false);
});

function hiddenForm(e){
  theForm = document.createElement('form');
  theForm.action = 'wizard.php';
  theForm.method = 'post';
  newInput1 = document.createElement('input');
  newInput1.type = 'hidden';
  newInput1.name = 'topGenre';
  if (sessionStorage.getItem("topGenre")!=null)
  	newInput1.value = sessionStorage.getItem("topGenre");
  else{
  	newInput1.value = "Metal";
  }
  theForm.appendChild(newInput1);
  if ((e.target == document.getElementById("selection").childNodes[3].childNodes[1]) || (e.target==document.getElementById("selection").childNodes[3].childNodes[3])){
    sessionStorage.setItem("lucky", true);
    console.log("lucky");
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'lucky';
    newInput1.value = true;
    theForm.appendChild(newInput1);
  }
  else
      sessionStorage.setItem("lucky", false);
  document.getElementById('selection').appendChild(theForm);
  theForm.submit();
}