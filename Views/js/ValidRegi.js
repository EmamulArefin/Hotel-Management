function Valid(lform) {
    
    const name = lform.name.value;
    const role = lform.role.value;
    const location = lform.location.value;
    const cnum = lform.cnum.value;
    const email = lform.email.value;
    const password = lform.password.value;
    const cpassword = lform.cpassword.value;

    let e1 = document.getElementById("err1");
    let e2 = document.getElementById("err2");
    let e3 = document.getElementById("err3");
    let e4 = document.getElementById("err4");
    let e5 = document.getElementById("err5");
    let e6 = document.getElementById("err6");
    let e7 = document.getElementById("err7");

    let flag = true;

    // Clear previous errors
    e1.innerHTML = "";
    e2.innerHTML = "";
    e3.innerHTML = "";
    e4.innerHTML = "";
    e5.innerHTML = "";
    e6.innerHTML = "";
    e7.innerHTML = "";

    // Validate form fields
    if (name === "") {
        e1.innerHTML = "Please Provide Your Name";
        flag = false;
    }

    if (!role) {
        e2.innerHTML = "Please Select Your role";
        flag = false;
    }

    if (location === "") {
        e3.innerHTML = "Please Provide location";
        flag = false;
    }

    if (cnum === "" || !validatePhoneNumber(cnum)) {
        e4.innerHTML = "Please Provide a Valid Mobile Number";
        flag = false;
    }

    if (email === "" || !validateEmail(email)) {
        e5.innerHTML = "Please Provide a Valid Email";
        flag = false;
    }

    if (password === "") {
        e6.innerHTML = "Please Enter Your Password";
        flag = false;
    }

    if (password.length < 6) {
        e6.innerHTML = "Password cannot be less than 6 characters";
        flag = false;
    }

    if (cpassword === "") {
        e7.innerHTML = "Confirm Password Cannot Be Empty";
        flag = false;
    }

    if (cpassword !== password) {
        e7.innerHTML = "Password and Confirm Password Do Not Match";
        flag = false;
    }

    // Perform AJAX email check if all validations pass
    if (flag) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../Models/Checkmail.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText === "exists") {
                    e5.innerHTML = "Email already exists";
                } else {
                    lform.submit();
                }
            }
        };
        xhr.send("email=" + email);
    }
    return false;
}

function validatePhoneNumber(phoneNumber) {
    const regex = /^(?:\+88\d{14}|\d{11})$/;
    return regex.test(phoneNumber);
}

function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}
