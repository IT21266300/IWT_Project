const faqItems = document.querySelectorAll(".faq-item");

faqItems.forEach(faqItem => {
    faqItem.addEventListener("click", function(){
        faqItem.classList.toggle("faq-a-active");
    });
});