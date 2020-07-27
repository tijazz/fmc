var user_trigger = document.querySelector(".user__dets");
var user_dets_list = document.getElementById("user_dets_list");
var arrow = document.getElementById("arrow")

user_trigger.addEventListener("click",function(){
    user_dets_list.classList.toggle("block");
    arrow.classList.toggle("rotated");
})