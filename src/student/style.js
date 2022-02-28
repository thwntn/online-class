$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()){
            $('header').addClass('sticky');
        }else{
            $('header').addClass('sticky');
        }
    });
});

var left=1;
var right=3;
function show(){
    for(i=left; i<=right; i++){
        document.getElementById("a"+i).style.display="inline-block";
    }
}

function moveLeft(){
    if(left<=3 && right<=6){
        document.getElementById("a"+left).style.display="none";
        left+=1;
        right+=1;
        for(i=left; i<=right; i++){
            document.getElementById("a"+i).style.display="inline-block";
        }
    } 
    else
        return;
}

function moveRight(){
    if(left>=2 && right>=5){
        document.getElementById("a"+right).style.display="none";
        left-=1;
        right-=1;
        for(i=left; i<=right; i++){
            document.getElementById("a"+i).style.display="inline-block";
        }
    } 
    else
        return;
}

//Thông báo
var status=0;
document.getElementById("menuclick").onclick = function() {myFunction()};
function myFunction() {
    if(status==0){
        document.getElementById("click").style.display="inline-block";
        status=1;
    }
    else{
        status=0;
        document.getElementById("click").style.display="none";
    }
}

//Tin nhấn
var status1=0;
document.getElementById("menuclick1").onclick = function() {myFunction1()};
function myFunction1() {
    if(status1==0){
        document.getElementById("click1").style.display="inline-block";
        status1=1;
    }
    else{
        status1=0;
        document.getElementById("click1").style.display="none";
    }
}

//Bài tập
var status2=0;
document.getElementById("menuclick2").onclick = function() {myFunction2()};
function myFunction2() {
    if(status2==0){
        document.getElementById("click2").style.display="inline-block";
        status2=1;
    }
    else{
        status2=0;
        document.getElementById("click2").style.display="none";
    }
}