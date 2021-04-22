const carouselSlide=document.querySelector(".slide");
// console.log(carouselSlide)

const carouselImages=document.querySelectorAll(".slide img");
console.log(carouselImages);

const prevBtn=document.querySelector("#prev");
const nextBtn=document.querySelector("#next");

let cnt=1;

const size=carouselImages[0].clientWidth;
// console.log(size)
carouselSlide.style.transform='translateX('+(-size*cnt)+'px)';

nextBtn.addEventListener("click",()=>{
    carouselSlide.style.transition='transform .5s ease';
    cnt++;
    carouselSlide.style.transform='translateX('+(-size*cnt)+'px)';
})

prevBtn.addEventListener("click",()=>{
    carouselSlide.style.transition='transform .5s ease';
    cnt--;
    carouselSlide.style.transform='translateX('+(-size*cnt)+'px)';
})

carouselSlide.addEventListener("transitionend",()=>{
    if(carouselImages[cnt].id="lastClone"){
        carouselSlide.style.transition='none';
        cnt=carouselImages.length-2;
        carouselSlide.style.transform='translateX('+(-size*cnt)+'px)';
    }
})