// function getPage(){
//     document.querySelectorAll(".t-btn").forEach(button => {
//       button.addEventListener('click', () => {
//         const btn = button.parentElement;
//         const pages = btn.parentElement;
//         const btnNo = button.dataset.forTab;
//         const activeBtn = pages.querySelector(`.details-page[data-tab='${btnNo}']`);

//         btn.querySelectorAll(".t-btn").forEach(button => {
//           button.classList.remove("t-btn-active");
//         });
        
//         pages.querySelectorAll(".details-page").forEach(page => {
//           page.classList.remove("details-page-active");
//         });

//         button.classList.add("t-btn-active");
//         activeBtn.classList.add("details-page-active");

//       });
//     });
//   }


//   document.addEventListener("DOMContentLoaded", ()=>{
//     getPage();
//   });


const btn1 = document.querySelector(".t-btn-01");
const btn2 = document.querySelector(".t-btn-02");
const page1 = document.querySelector(".details-page-01");
const page2 = document.querySelector(".details-page-02");


btn1.addEventListener("click", function(){
  page1.style.display = "block";
  page2.style.display = "none";
  btn1.classList.add("t-btn-active");
  btn1.classList.remove("t-btn-02");
  btn2.classList.remove("t-btn-active");
});


btn2.addEventListener("click", function(){
  page2.style.display = "block";
  page1.style.display = "none";
  btn2.classList.add("t-btn-active");
  btn1.classList.add("t-btn-02");
  btn1.classList.remove("t-btn-active");
});
