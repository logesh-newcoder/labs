// select the some tags in html page for a set for work
var cre=document.querySelector(".create");
var csv=document.querySelector(".import");

function load(){
    let posid = document.querySelector("#idpos");
    if(posid.value==="kasc@101"){
        // If the value is equal mean is work because the student not to view this
        cre.style.display = "none";
        csv.style.display = "none";
    }
    else{
        cre.style.display = "block";        
        csv.style.display = "block";        
        form.style.display = "block";        
    }
}
load();