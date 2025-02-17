const passwordField = document.getElementById('password');
const togglePassword = document.getElementById('togglePassword');

togglePassword.addEventListener('click', () => {
    // Toggle the type attribute
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;

    // Toggle the eye icon
    togglePassword.classList.toggle('fa-eye');
    togglePassword.classList.toggle('fa-eye-slash');
});
