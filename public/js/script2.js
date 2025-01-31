document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting via the browser

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (email.trim() === '' || password.trim() === '') {
        alert('Please fill in both email and password.');
        return;
    }

    // Simulate an API call
    console.log('Logging in with:', email, password);
    alert('Login successful! (simulated)');
});