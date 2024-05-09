function checkPasswordMatch() {
    var password = document.getElementById("inputPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var errorText = document.getElementById("passwordMatchError");

    if (password !== confirmPassword) {
        errorText.style.display = "inline";
    } else {
        errorText.style.display = "none";
    }
}