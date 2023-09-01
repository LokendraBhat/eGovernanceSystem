function doValidate() {
    var name = document.getElementById("fna");
    var password = document.getElementById("psw");
    var re_pass = document.getElementById("re-psw");
    var phone = document.getElementById("phno");
    var Email = document.getElementById("email");
    var dob = document.getElementById("dob");

    // Full Name validation
    if (name.value == "" || name.value.length < 3 || name.value.charAt(0) == " " || !isNaN(name.value)) {
        name.focus();
        name.style.border = "1px solid Red";
        return false;
    }
    else {
        name.style.border = "1px solid transparent";
    }

    // Phone number validation
    if (phone.value == "" || phone.value.length != 10 || isNaN(phone.value)) {
        phone.focus();
        phone.style.border = "1px solid Red";
        return false;
    }
    else {
        phone.style.border = "1px solid transparent";
    }

    // Email validation
    if (Email.value == "") {
        Email.focus();
        Email.style.border = "1px solid Red";
        return false;
    }
    else {
        Email.style.border = "1px solid transparent";
    }

    // Password validation
    if (password.value == "" || password.value.length < 5) {
        password.focus();
        password.style.border = "1px solid Red";
        return false;
    }
    else {
        password.style.border = "1px solid transparent";
    }

    // Re-Password validation
    if (password.value !== re_pass.value) {
        re_pass.focus();
        re_pass.style.border = "1px solid Red";
        return false;
    }
    else {
        re_pass.style.border = "1px solid transparent";
    }

    // DateOfBirth validation
    if (dob.value == "") {
        dob.focus();
        dob.style.border = "1px solid Red";
        return false;
    }
    else {
        dob.style.border = "1px solid transparent";
    }

    // term and conditions validation
    if (!document.getElementById("check").checked) {
        alert("Please accept term and conditions!");
        return false;
    }
    return true;
}