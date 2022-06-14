const signinBtn = document.getElementById("signin");
const signupBtn = document.getElementById("signup");
const container = document.querySelector(".container");

signinBtn.addEventListener("click", () => {
    container.classList.remove("right-panel-active")
})

signupBtn.addEventListener("click", () => {
    container.classList.add("right-panel-active")
})

