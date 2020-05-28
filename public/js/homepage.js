window.onload = function() {
    faqsSwitch(0);
}
//Switch de panel
function faqsSwitch(n) {
    var menuItems = document.getElementsByClassName('faq-menu-item');
    var subItems = document.getElementsByClassName('faq-list');
    var title = document.getElementById('faq-title');
    
    for(var i = 0; i < subItems.length; i++) {
        subItems[i].classList.add("display-none");
        menuItems[i].classList.remove("active");
    }
    menuItems[n].classList.add("active");
    subItems[n].classList.remove("display-none");
    title.innerHTML = menuItems[n].innerHTML;
}
