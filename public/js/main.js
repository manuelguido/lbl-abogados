function panelToggle() {
    function switchIcon(){
        var button = document.getElementById("panel-toggle");
        if (button.classList.contains("fa-bars")){
            button.classList.remove("fa-bars");
            button.classList.add("fa-arrow-left");
        }
        else {
            button.classList.remove("fa-arrow-left");
            button.classList.add("fa-bars");
        }
    }
    
    var menu = document.getElementById("panel-menu");
    var smenu = document.getElementById("panel-menu-inner");
    if (menu.classList.contains('hide')) {
        menu.classList.remove("hide");
        smenu.classList.remove("display-n");
    }
    else{
        menu.classList.add("hide");
        smenu.classList.add("display-n");
    }
    switchIcon();
}

function showMessage(n) {
    var messages = document.getElementsByClassName('full-message');
    for(var i = 0; i < messages.length; i++) {
        messages[i].classList.add("display-n");
    }
    messages[n].classList.remove("display-n");
}

//Panel reset
function panelReset(tabs){
    for(var i = 0; i < tabs.length; i++) {
        tabs[i].style.display = 'none';
    }
}

//Panel switch
function panelSwitch(n,tab) {
    var tabs = document.getElementsByClassName(tab);
    if (tabs[n].style.display == 'block'){
        panelReset(tabs);
    }
    else {
        panelReset(tabs);
        tabs[n].style.display = 'block';
    }
}

//Panel reset
function accordeonReset(tabs){
    for(var i = 0; i < tabs.length; i++) {
        tabs[i].style.display = 'none';
    }
}

//Panel switch
function accordeonSwitch(n,tab) {
    var tabs = document.getElementsByClassName(tab);
    if (tabs[n].style.display == 'block'){
        panelReset(tabs);
    }
    else {
        panelReset(tabs);
        tabs[n].style.display = 'block';
    }
}