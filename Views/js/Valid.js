function Valid(lform){

    const email = lform.email.value;
    const password = lform.password.value;

    let e1 = document.getElementById("err1");
    let e2 = document.getElementById("err2");
    let flag= true;

    e1.innerHTML="";
    e2.innerHTML="";

    if(email===""){
        e1.innerHTML="Please Provide Valid an Email";
        flag=false;
    }

    if(password===""){
        e2.innerHTML="Please Enter Your Password";
        flag=false;
    }

    return flag;

}