const togglePasswordInput = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
togglePasswordInput.addEventListener('change', function () {
    if(togglePasswordInput.checked){
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
})