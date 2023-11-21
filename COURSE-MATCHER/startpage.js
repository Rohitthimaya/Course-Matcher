document.getElementById("login-btn").addEventListener("click", showLoginModal);
document.getElementById("signup-btn").addEventListener("click", showSignUpModal);
document.getElementById("cancel-modal-login").addEventListener("click", hideModals)
document.getElementById("cancel-modal-signup").addEventListener("click", hideModals)
document.getElementById("blanket").addEventListener("click", hideModals)


function showLoginModal(){
    document.getElementById("modal-login").style.display = "block";
    document.getElementById("blanket").style.display = "block";
}

function showSignUpModal(){
    document.getElementById("modal-signup").style.display = "block";
    document.getElementById("blanket").style.display = "block";
}

function hideModals(){
    document.getElementById("modal-login").style.display = "none";
    document.getElementById("modal-signup").style.display = "none";
    document.getElementById("blanket").style.display = "none";
}