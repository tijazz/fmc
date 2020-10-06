let backdrop = document.querySelector('.backdrop');
let notifications = document.querySelector('.notifications__')
let notificationTrigger = document.querySelector("#page-wrapper > div:nth-child(1) > nav > ul > li.dropdown.notifier");
let notificationBell = document.querySelector(".notification-bell");
let notificationCount = document.querySelector("#page-wrapper > div:nth-child(1) > nav > ul > li.dropdown.notifier > a > span")
notificationTrigger.addEventListener('click',() => {
    backdrop.classList.add('shown')
    notifications.classList.add('shown')
    notificationBell.classList.add('shaker')
})

backdrop.addEventListener('click',() => {
    backdrop.classList.remove('shown')
    notifications.classList.remove('shown')
    notificationBell.classList.remove('shaker')
})


window.onload = () => {
    var notificationListCount  = notifications.querySelectorAll('li').length
    notificationCount.innerHTML = notificationListCount
    
}