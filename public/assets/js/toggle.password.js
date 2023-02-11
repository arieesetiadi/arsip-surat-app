// Toggle Password
const togglePasswordInput = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
togglePasswordInput.addEventListener('change', function () {
    if(togglePasswordInput.checked){
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
})

// Toggle Password Confirmation
const togglePasswordConfirmationInput = document.getElementById('togglePasswordConfirmation');
const passwordConfirmationInput = document.getElementById('password_confirmation');
togglePasswordConfirmationInput.addEventListener('change', function () {
    if(togglePasswordConfirmationInput.checked){
        passwordConfirmationInput.type = 'text';
    } else {
        passwordConfirmationInput.type = 'password';
    }
})