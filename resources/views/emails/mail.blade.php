<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <p>Hello Admin,</p>

    <p>A new contact form submission has been received on your website. Here are the details:</p>

    <ul>
        <li>Nom: {{ $data['nom'] }}</li>
        <li>Prenom: {{ $data['prenom'] }}</li>
        <li>Email: {{ $data['email'] }}</li>
        <li>Message: {{ $data['message'] }}</li>
    </ul>

    <p>Thank you for your attention to this matter.</p>

    <p>Best regards,<br>
    Your Website Team</p>
</body>
</html>
