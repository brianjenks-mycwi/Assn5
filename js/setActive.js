function setActive(setMeActive) {
    var element = document.getElementById(setMeActive);
    var bodyClass = document.body;
    
    element.classList.add("active"); //Add the active class to the link
    if (setMeActive == "calc") { //calc uses a different style than other pages
        bodyClass.classList.add("calculator");
    } else {
        bodyClass.classList.add("index"); //This is for default CSS
    }
}
