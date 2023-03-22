window.addEventListener('scroll',()=>{
    const scrolled = window.scrollY;
    if(scrolled >=5){
        document.getElementById('navbar__sticky').style.display = "block";
        document.getElementById('navbar__sticky').style.position = "fixed";
        document.getElementById('navbar__sticky').style.top = "0";
    }
    else{
       document.getElementById('navbar__sticky').style.display = "none";
       document.getElementById('navbar__sticky').style.position = "static";
    }
});