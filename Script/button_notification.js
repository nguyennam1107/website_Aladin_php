let currentNotification = 0;
const notifications = document.querySelectorAll('.notification-item');
const notificationBar = document.getElementById('notification-bar');
const closeButton = document.getElementById('close-btn');

notifications[currentNotification].style.display = 'inline-block';
notificationBar.style.display = 'block'; 

function showNextNotification() {

    notifications.forEach(notification => {
        notification.style.display = 'none';
    });


    notifications[currentNotification].style.display = 'inline-block';
    notificationBar.style.display = 'block'; 


    currentNotification = (currentNotification + 1) % notifications.length;

    setTimeout(showNextNotification, 10000); 
}


showNextNotification();
closeButton.addEventListener('click', function () {
    notificationBar.style.display = 'none';
});
