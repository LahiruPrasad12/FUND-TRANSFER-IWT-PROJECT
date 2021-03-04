//auto logout when user is inactive

//duration has made for 20s to view funtion quickly
var duration = 20;
var timer = document.getElementById("timer");

setInterval(updatetimer, 1000);

function updatetimer(){

    duration--;
    if(duration<1){
        window.location="dashboard.html";
        
    }
   
    if(duration<10){

        timer.innerText=duration;
        document.getElementById("timer").style.background = "rgb(190, 85, 0)";
        
        

    }
    if(duration<2){
        document.getElementById("timer").style.background = "rgb(190, 0, 0)";
    
        
    }
  

}
window.addEventListener("mousemove",reset);


function reset(){
    duration=20;
    timer.innerText="logout";
    document.getElementById("timer").style.background = "none";
   
}