function Valid(lform) {
    const newpassword = lform.newpass.value;
    const cpassword = lform.confpass.value;
    const oldpassword = lform.oldpass.value;

    let e1 = document.getElementById("err1");
    let e2 = document.getElementById("err2");
    let e3 = document.getElementById("err3");
    let e4 = document.getElementById("err4");

    let flag = true;

    // Clear previous errors
    e1.innerHTML = "";
    e2.innerHTML = "";
    e3.innerHTML = "";
    e4.innerHTML = "";

    if (oldpassword === "") {
        e1.innerHTML = "Current Password Cannot be Empty";  // Change to e1
        flag = false;
    }

    if (newpassword === "") {
        e2.innerHTML = "New Password Cannot be Empty";  // Change to e2
        flag = false;
    }

    if (cpassword === "") {
        e3.innerHTML = "Confirm Password Cannot be Empty";  // Change to e3
        flag = false;
    }

    if (cpassword !== newpassword) {  // Correct comparison
        e4.innerHTML = "Password and Confirm Password Do Not Match";  // e4 for password mismatch
        flag = false;
    }

    if(flag){
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../Models/CheckPass.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText === "matched") {
                    e1.innerHTML = "Current Password Dose not matched";
                } else {
                    lform.submit();
                }
            }
        };
        xhr.send("oldpassword=" + oldpassword);
        }

        return false;
}