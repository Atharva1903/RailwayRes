/*show password*/
function show(){
    let icon = document.getElementById('eye');
        if(icon.src.match("eye.svg")){
            icon.src = "eyec.svg";
        }
        else{
            icon.src = "eye.svg";
        }
    var x = document.getElementById("pass");
    if(x.type === "password") {
        x.type = "text";
    } 
    else{
        x.type = "password";
    }
}
function show1(){
    let icon = document.getElementById('eye1');
        if(icon.src.match("eye.svg")){
            icon.src = "eyec.svg";
        }
        else{
            icon.src = "eye.svg";
        }
    var x = document.getElementById("rpass");
    if(x.type === "password") {
        x.type = "text";
    } 
    else{
        x.type = "password";
    }
}
/* INDEX PAGE */
function exchange() {
    // Get the values of the textboxes
    var textbox1Value = document.getElementById("s").value;
    var textbox2Value = document.getElementById("i").value;

    // Swap the values
    document.getElementById("s").value = textbox2Value;
    document.getElementById("i").value = textbox1Value;
}
var img = document.getElementById("ex");
    img.addEventListener("click", function(){
    exchange();
});
function check_pass(){
    var pass = document.getElementById('pass').value;
    var rpass = document.getElementById('rpass').value;
    if(pass != rpass){
        document.getElementById('rpasstb').style.border = '2px solid red';
        document.getElementById('incorrect').innerHTML = '*Both password should match.<br>'
        document.getElementById("subbtn").disabled = true;
    }
    else{
        document.getElementById('rpasstb').style.border = '1px solid rgb(207, 207, 207)';
        document.getElementById('incorrect').innerHTML = ''
        document.getElementById("subbtn").disabled = false;
    }
}
function shows(){
    document.getElementById('drop').classList.toggle('active');
}

