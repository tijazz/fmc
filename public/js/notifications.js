let backdropd = document.querySelector('.backdrop');
let notificationsd = document.querySelector('.notifications__')
let notificationTriggerd= document.querySelector("#page-wrapper > div:nth-child(1) > nav > ul > li.dropdown.notifier");
let notificationBelld = document.querySelector(".notification-bell");
let notificationCountd = document.querySelector("#page-wrapper > div:nth-child(1) > nav > ul > li.dropdown.notifier > a > span")
notificationTriggerd.addEventListener('click',() => {
    backdropd.classList.add('shown')
    notificationsd.classList.add('shown')
    notificationBelld.classList.add('shaker')
})

backdropd.addEventListener('click',() => {
    backdropd.classList.remove('shown')
    notificationsd.classList.remove('shown')
    notificationBelld.classList.remove('shaker')
})


window.onload = () => {
    var notificationListCount  = notificationsd.querySelectorAll('li').length
    notificationCountd.innerHTML = notificationListCount
    
}