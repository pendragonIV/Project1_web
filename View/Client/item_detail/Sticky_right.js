
window.addEventListener('scroll',()=>{
    const scrolled = window.scrollY;
    // get margin 
    const BoxImg = document.getElementById('imgs__gallery--id');
    let HeightBoxImg = BoxImg.offsetHeight;
    const BoxIn4 = document.getElementById('content__container__item__in4--id');
    let HeightBoxIn4 = BoxIn4.offsetHeight;

    let margin= HeightBoxImg - HeightBoxIn4
    if(scrolled > margin+50){
        document.getElementById('content__container__item__in4--id').style.position = "relative";
        document.getElementById('content__container__item__in4--id').style.top = HeightBoxImg - HeightBoxIn4 + 'px';
    }
    else if(scrolled <= 80){
        document.getElementById('content__container__item__in4--id').style.position = "fixed";
        document.getElementById('content__container__item__in4--id').style.top = "155px";
        document.getElementById('content__container__item__in4--id').style.marginTop = "0px";
    }
    else{
        document.getElementById('content__container__item__in4--id').style.position = "fixed";
        document.getElementById('content__container__item__in4--id').style.top = "75px";
        document.getElementById('content__container__item__in4--id').style.marginTop = "0px";
    //    if(scrolled >=100){
    //     document.getElementById('content__container__item__in4--fixed').style.top = "70px";
    //    }
    //    else{
    //     document.getElementById('content__container__item__in4--fixed').style.top = "157px";
    //    }
    }
});
