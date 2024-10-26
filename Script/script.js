const signInForm = document.getElementById('signInForm');
const signUpForm = document.getElementById('signUpForm');
const container = document.querySelector('.container');
const switchToSignup = document.getElementById('switchToSignup');
const switchToSignin = document.getElementById('switchToSignin');

switchToSignup.addEventListener('click', () => {
    container.classList.add('flipped');
    signUpForm.style.display = 'block';  
    signInForm.style.display = 'none';   
});

switchToSignin.addEventListener('click', () => {
    container.classList.remove('flipped');
    signInForm.style.display = 'block';  
    signUpForm.style.display = 'none';   
});