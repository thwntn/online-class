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

/*

document.querySelector('.frameNoti').addEventListener('click', function(event){
    event.stopPropagation()
})
document.querySelectorAll('.frameNoti')[1].addEventListener('click', function(event){
    event.stopPropagation()
})


//Background Header
document.addEventListener('scroll', () => {
    if(window.scrollY > 0) {
        document.querySelector('.backgroundNav').classList.remove('noactiveNav')
        document.querySelector('.backgroundNav').classList.add('activeNav')
    }
    else {
        document.querySelector('.backgroundNav').classList.add('noactiveNav')
        document.querySelector('.backgroundNav').classList.remove('activeNav')
    }
})


//Content Mess
var contentMess = false
const itemNoti = document.querySelectorAll('.itemNoti')
for (i of itemNoti){
    i.addEventListener('click', function(){
        if(!contentMess) {
            document.querySelector('.frameMess').style.display = 'flex'
            contentMess = true
        }
        else {
            document.querySelector('.frameMess').style.display = 'none'
            contentMess = false
        }
    })
}
document.querySelector('.backMess').addEventListener('click', () => {
    document.querySelector('.frameMess').style.display = 'none'
    contentMess = false
})

//Baitap
/*var noti = false
document.querySelector('.baitap').addEventListener('click', function() {
    if(!noti) {
        document.querySelector('.btap').style.display = 'flex'
        noti = true
    }
    else {
        document.querySelector('.btap').style.display = 'none'
        noti = false
    }
})


//Active Noti
var noti = false
document.querySelector('.actNoti').addEventListener('click', function() {
    if(!noti) {
        document.querySelector('.noti').style.display = 'flex'
        noti = true
    }
    else {
        document.querySelector('.noti').style.display = 'none'
        noti = false
    }
})


//Active Message
var mess = false
document.querySelector('.actMess').addEventListener('click', function() {
    if(!mess) {
        document.querySelector('.mess').style.display = 'flex'
        mess = true
    }
    else {
        document.querySelector('.mess').style.display = 'none'
        mess = false
    }
})

*/