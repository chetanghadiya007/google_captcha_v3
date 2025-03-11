<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reCAPTCHA v3 Example</title>
</head>
<body>
    <form id="myForm" action="process.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
        <button type="submit">Submit</button>
    </form>

    <script src="https://www.google.com/recaptcha/api.js?render=YOUR_SITE_KEY"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('YOUR_SITE_KEY', { action: 'submit' }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
        });

        document.getElementById('myForm').addEventListener('submit', function(e) {
            const recaptchaValue = document.getElementById('g-recaptcha-response').value;
            if (!recaptchaValue) {
                e.preventDefault();  // Prevent form submission if no token
                alert('Please complete the reCAPTCHA verification.');
            }
        });
    </script>
</body>
</html>