let notificationsd = document.querySelector('.notifications__')
notificationCountd = document.querySelector('.notifier a span')

window.onload = () => {
    var notificationListCount  = document.querySelectorAll('.user_notification').length
    notificationCountd.innerHTML = notificationListCount
    
}