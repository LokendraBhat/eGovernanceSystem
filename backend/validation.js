function doValidate() {
    var name = document.getElementById("fna");
    var password = document.getElementById("psw");
    var re_pass = document.getElementById("re-psw");
    var phone = document.getElementById("phno");
    var Email = document.getElementById("email");
    var dob = document.getElementById("dob");
    var cit_no = document.getElementById("CNo");


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
    if (age < 60) {
        alert("You must be 60+ to register!");
        return false;
    }
    if (dob.value == "" ) {
        dob.focus();
        dob.style.border = "1px solid Red";
        return false;
    }
    else {
        dob.style.border = "1px solid transparent";
    }
    
    // validate for 60+ age
    // Age validation
    var today = new Date();
    var birthDate = new Date(dob.value);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }
    if(age < 60)
    {
        alert("You must be 60+ to register!");
        dob.focus();
        return false;
    }
    else if(age > 100)
    {
        alert("You must be verify for age 100+ to register!");
        dob.focus();
        return false;
    }

    // Citizen number validation
    if (cit_no.value == "" || isNaN(cit_no.value)) {
        cit_no.focus();
        cit_no.style.border = "1px solid Red";
        return false;
    }
    else {
        cit_no.style.border = "1px solid transparent";
    }

    // term and conditions validation
    if (!document.getElementById("check").checked) {
        alert("Please accept term and conditions!");
        return false;
    }
    return true;
}