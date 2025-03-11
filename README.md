# reCAPTCHA v3 Integration

This repository demonstrates how to integrate **Google reCAPTCHA v3** to enhance security and prevent spam in your web application.

## 🚀 Getting Started

### Prerequisites
- A Google reCAPTCHA account ([Admin Console](https://www.google.com/recaptcha/admin/create))
- Site Key and Secret Key generated from Google reCAPTCHA v3

---

## 📄 Installation

1. Clone this repository:
   ```bash
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```bash
   cd recaptcha-integration
   ```
3. Install dependencies if required.
4. Add your **Site Key** and **Secret Key** in the respective places in the code.
5. Deploy your application securely.

---

## 💻 Frontend Integration

Add the following HTML and JavaScript code to your form page:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reCAPTCHA v3 Example</title>
</head>
<body>
    <form id="myForm" action="/submit-form" method="POST">
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
    </script>
</body>
</html>
```

✅ **`YOUR_SITE_KEY`** — Replace this with your actual **Site Key**.

---

## 🔒 Backend Integration (PHP Example)

Add this PHP code to verify the reCAPTCHA response:

```php
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $recaptchaSecret = "YOUR_SECRET_KEY";
    $recaptchaResponse = $_POST['g-recaptcha-response'];

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
```

✅ **`YOUR_SECRET_KEY`** — Replace this with your actual **Secret Key**.

---

## ✅ Best Practices

- Store your **Site Key** and **Secret Key** securely in environment variables.
- For sensitive actions (e.g., payments), consider using a higher score threshold (e.g., `>= 0.7`).

---

## ❓ Troubleshooting

- Ensure your **Site Key** is correctly placed in the `<script>` tag.
- Verify the **backend logic** properly checks the response score.

If you encounter any issues, feel free to raise an issue in this repository. 😊

