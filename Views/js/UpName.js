function Valid(lform) {
    const name = lform.newname.value;
    const email = lform.email.value; // Add this line to define the email variable

    let e1 = document.getElementById("err1");
    let e2 = document.getElementById("err2");

    let flag = true;

    // Clear previous errors
    e1.innerHTML = "";
    e2.innerHTML = "";

    if (name === "") {
        e1.innerHTML = "Please Provide Your Name";
        flag = false;
    }

    if(flag){
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../Models/UserI.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText === "success") {
                    e2.innerHTML = "Updated Successfully";
                } else {
                    e2.innerHTML = "Failed to update Name";
                }
            }
        };
        xhr.send("name=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email));
        }

        return false;
}
