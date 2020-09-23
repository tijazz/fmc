var user_trigger = document.querySelectorAll(".user__dets");
var user_dets_list = document.querySelectorAll("#user_dets_list");
var arrow = document.querySelectorAll("#arrow");


user_trigger[0].addEventListener("click",function(){
    user_dets_list[0].classList.toggle("block");
    arrow[0].classList.toggle('arrow1_rotate');
});

user_trigger[1].addEventListener("click",function(){
    user_dets_list[1].classList.toggle("block");
    arrow[1].classList.toggle("rotated");
});
