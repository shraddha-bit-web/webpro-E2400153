document.addEventListener('DOMContentLoaded', function() {
    const loginBtn = document.getElementById('login-btn');
    const signupBtn = document.getElementById('signup-btn');
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');

    loginBtn.addEventListener('click', function() {
        loginForm.classList.remove('d-none');
        signupForm.classList.add('d-none');
    });

    signupBtn.addEventListener('click', function() {
        loginForm.classList.add('d-none');
        signupForm.classList.remove('d-none');
    });
});
