document.getElementById("slide__container").style.display="none";
let slideCart = document.getElementById("slide__container");
function slideIn(){
    if(slideCart.style.display == "none"){
        document.getElementById("slide__container").style.display="block";
        document.getElementById("slide__container").style.background="rgba(0, 0, 0, 0.8)";
        document.getElementById("slide__cart--id").style.animation="slideIn ease .5s";
    }
    else{
        document.getElementById("slide__container").style.display="none";
    }
}

function slideOut(){
    if(slideCart.style.display == "block"){
        document.getElementById("slide__cart--id").style.animation="slideOut ease .5s";
        document.getElementById("slide__container").style.background="transparent";
        setTimeout(()=>{
            document.getElementById("slide__container").style.display="none";
        },200);
    }
}
