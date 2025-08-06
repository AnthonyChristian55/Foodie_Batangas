const navbarMenu = document.querySelector(".navbar .links")
const menuBtn = document.querySelector(".menu-btn");
const hideMenuBtn = navbarMenu.querySelector(".close-btn");
const showPopupBtn = document.querySelector(".button-3d");
const formPopup = document.querySelector(".form-popup");
const hidePopupBtn = document.querySelector(".form-popup .close-btn");
const loginSignupLink = document.querySelectorAll(".form-box .bottom-link a");



// showing the menu on mobile phone
menuBtn.addEventListener("click", () => {
        navbarMenu.classList.toggle("show-menu");
});

hideMenuBtn.addEventListener("click", () => menuBtn.click());


// it will show the login form popup
showPopupBtn.addEventListener("click", () => {
        // console.log("Button clicked");
    document.body.classList.toggle("show-popup");
    

});

// it will hide the login form popup
hidePopupBtn.addEventListener("click", () => showPopupBtn.click());

loginSignupLink.forEach(link => {
        link.addEventListener("click", (e) => {
                e.preventDefault();
                console.log(link.id);
               formPopup.classList[link.id === "signup-link" ? 'add' : 'remove'] ("show-signup");
        }); 
});








// document.getElementById("button").addEventListener("click", function(){

//         document.querySelector(".form-popup").style.display = "flex";
// });

// const showPopupBtn = document.querySelector(".log");
// const popup = document.getElementById("popup");

// showPopupBtn.addEventListener("click", () => {
//     popup.style.display = "block";
// });

// function closePopup() {
//     popup.style.display = "none";
// }