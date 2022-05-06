const container = document.querySelector('.container');
const sIcon = document.querySelector(".s-icon");
const searchContent = document.querySelector(".search-content");

sIcon.addEventListener("click", function(){
  searchContent.classList.toggle("active-search");
}); 

function clearContent(){
  
  const sIn = document.getElementById("search-input").value;
  if(sIn == ""){
    searchContent.classList.remove("active-search");
  }
  document.getElementById("search-input").value = "";
}


const topHeader = document.querySelector(".top-header");
const topLink = document.querySelector(".top-link");

window.addEventListener("scroll", function(){
  const scrollHeight = window.pageYOffset;
  const navHeight = topHeader.getBoundingClientRect().height;

  if(scrollHeight > navHeight){
    topHeader.classList.add('fixed-top-header');
  }
  else{
    topHeader.classList.remove('fixed-top-header');
  }

  if(scrollHeight > navHeight){
    topLink.classList.add('show-link');
  }
  else{
    topLink.classList.remove('show-link');
  }
});

const feedSec = document.querySelector(".feedback-sec");
const feedBtn = document.querySelector(".feed-link");
const closeBtn = document.querySelector(".f-c-btn");


feedBtn.addEventListener("click", function(){
  feedSec.classList.add("show-feed");
});

closeBtn.addEventListener("click", function(){
  feedSec.classList.remove("show-feed");
});




// copyright
const cpyDate = document.getElementById("cpy-date");
cpyDate.innerHTML = new Date().getFullYear();