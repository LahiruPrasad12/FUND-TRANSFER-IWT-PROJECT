
//show hide password

var eye = document.getElementById("eye");
var pass = document.getElementById("password");
var show = false;



eye.addEventListener("click",function(){

    if(show==false){pass.setAttribute("type","text");
    eye.classList.add("fa-eye-slash");
    eye.classList.remove("fa-eye");
    show = true;
}else{
    pass.setAttribute("type","password");
    eye.classList.remove("fa-eye-slash");
    eye.classList.add("fa-eye");
    show = false;

}

    


});


