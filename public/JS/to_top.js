window.addEventListener('scroll',()=>{
    const scrolled = window.scrollY;
    if(scrolled >=20){
        document.getElementById('btn__to--top').style.display = "block";
    }
    else{
       document.getElementById('btn__to--top').style.display = "none";
    }
});

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }