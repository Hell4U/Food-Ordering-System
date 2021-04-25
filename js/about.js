// console.log("hello");

const detail = [
    {
      id: 1,
      name: "neel mungra",
      img:
        "./images/neel.jpg",
      text:
        "Hi, I am Neel Mungra one of the developer of this amazing web-app. I am student of Nirma University pursuing 3rd year of my B.Tech degree. I have worked equally on front-end and  back-end. I hope you will like your stay here."
      },
      {
      id: 2,
      name: "yash mangukiya",
      job: "web designer",
      img:
        "./images/yash1.jpg",
      text:
        "Hi, I am Yash Mangukiya one of the developer of this amazing web-app. I am student of Nirma University pursuing 3rd year of my B.Tech degree. I have worked on back-end only. I hope you will like your stay here.",
    },
    {
        id: 3,
        name: "mohit tilala",
        img:
        "./images/mohitjpg.jpg",
        text:
          "Hi, lastly I am Mohit Tillala one of the developer of this amazing web-app. I am student of Nirma University pursuing 3rd year of my B.Tech degree. I have worked on back-end and some part of front-end. I hope you will like your stay here.",
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