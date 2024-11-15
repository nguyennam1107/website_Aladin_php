
document.getElementById('togglePanel').addEventListener('click', function(event) {  
    event.preventDefault();
    var panel = document.getElementById('myPanel');  
    panel.classList.toggle('show'); 
});  