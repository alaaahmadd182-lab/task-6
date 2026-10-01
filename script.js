//frontend validation
//this code will run before allowing the submission to continue to check if user's input is valid
let form = document.getElementById("signup_form");
form.addEventListener("submit", function(event) {
    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    if (/\s/.test(username)) {//checks if username contains spaces
        alert("Username cannot contain spaces.");
        event.preventDefault();//stops the form from being sent to php
        return;
    }

    if (!email.includes("@")) {
        alert("Please enter a valid email.");
        event.preventDefault();
        return;
    }

    if (password.length <= 6) {
        alert("Please enter a password longer than 6 characters");
        event.preventDefault();
        return;
    }
});