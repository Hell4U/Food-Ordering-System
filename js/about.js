// console.log("hello");

const detail = [
    {
      id: 1,
      name: "neel mungra",
      img:
        "./images/burger.jpg",
      text:
        "I'm baby meggings twee health goth +1. Bicycle rights tumeric chartreuse before they sold out chambray pop-up. Shaman humblebrag pickled coloring book salvia hoodie, cold-pressed four dollar toast everyday carry",
    },
    {
      id: 2,
      name: "yash mangukiya",
      job: "web designer",
      img:
        "./images/yash1.jpg",
      text:
        "Helvetica artisan kinfolk thundercats lumbersexual blue bottle. Disrupt glossier gastropub deep v vice franzen hell of brooklyn twee enamel pin fashion axe.photo booth jean shorts artisan narwhal.",
    },
    {
        id: 3,
        name: "mohit tilala",
        img:
        "./images/mohit_1.jpg",
        text:
          "Helvetica artisan kinfolk thundercats lumbersexual blue bottle. Disrupt glossier gastropub deep v vice franzen hell of brooklyn twee enamel pin fashion axe.photo booth jean shorts artisan narwhal.",
      },
  ];

// console.log(detail);

let cnt=0;

const img=document.getElementById("person-img");
const names=document.getElementById("person-name");
const desc=document.getElementById("person-desc");

const preBtn=document.querySelector("#prev-btn");
const nxtBtn=document.querySelector("#next-btn");

console.log(nxtBtn);

// console.log(img,name,desc);

// On loading HTMl PAGE
window.addEventListener("DOMContentLoaded",()=>{
    showPerson(cnt);
})

// Change the person accordingly
showPerson=(person)=>{
    const item=detail[person];
    // console.log(item.name);
    img.src=item.img;
    names.textContent=item.name;
    desc.textContent=item.text;
  }

  nxtBtn.addEventListener("click",function(){
    cnt++;
    cnt=cnt%detail.length;
    showPerson(cnt);
  })
  
  //show prev person
  preBtn.addEventListener("click",function(){
    cnt--;
    cnt=(detail.length+cnt)%detail.length;
    showPerson(cnt);
  })