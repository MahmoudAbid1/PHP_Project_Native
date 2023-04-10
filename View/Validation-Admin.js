function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var phone_number = document.getElementById("phone_number").value;
    var username_error = document.getElementById("username-error");
    var email_error = document.getElementById("email-error");
    var password_error = document.getElementById("password-error");
    var phone_number_error = document.getElementById("phone_number-error");
    var valid = true;

    // Check username length
    if (username.length < 3) {
        username_error.innerHTML = "The username is too short";
        valid = false;
    } else if (username.length > 30) {
        username_error.innerHTML = "The username is too long";
        valid = false;
    } else {
        username_error.innerHTML = "";
    }

    // Check email format
    if (!/\S+@\S+\.\S+/.test(email)) {
        email_error.innerHTML = "Invalid email format";
        valid = false;
    } else {
        email_error.innerHTML = "";
    }

    // Check password format
    if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password)) {
        password_error.innerHTML = "The password must contain at least 8 characters, including letters and numbers";
        valid = false;
    } else {
        password_error.innerHTML = "";
    }

    // Check phone number format
    if (!/^\d+$/.test(phone_number)) {
        phone_number_error.innerHTML = "The phone number must contain only numbers";
        valid = false;
    } else {
        phone_number_error.innerHTML = "";
    }

    // Check empty fields
    if (username.trim() === '') {
        username_error.innerHTML = "Username is required";
        valid = false;
    }

    if (email.trim() === '') {
        email_error.innerHTML = "Email is required";
        valid = false;
    }

    if (password.trim() === '') {
        password_error.innerHTML = "Password is required";
        valid = false;
    }

    if (phone_number.trim() === '') {
        phone_number_error.innerHTML = "Phone number is required";
        valid = false;
    }

    return valid;
}
