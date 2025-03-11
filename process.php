<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $recaptchaSecret = "YOUR_SECRET_KEY";
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify the response with Google
    $verifyURL = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}";
    $response = file_get_contents($verifyURL);
    $responseData = json_decode($response);

    if ($responseData->success && $responseData->score >= 0.5) {
        echo "Form submitted successfully!";
    } else {
        echo "reCAPTCHA verification failed. Please try again.";
    }
}
?>