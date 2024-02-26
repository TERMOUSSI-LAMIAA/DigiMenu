<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement Ending Soon</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>

    <p>We wanted to inform you that your Abonnement is ending soon. Please review the details below:</p>

    <ul>
        <li><strong>Abonnement Type:</strong> {{ $abonnement->type }}</li>
        <li><strong>End Date:</strong> {{ $user->end_date_abonnement }}</li>
        <!-- Add other details as needed -->
    </ul>

    <p>If you have any questions or need assistance, feel free to contact us. Thank you for using our service!</p>

    <p>Best regards,</p>
    <p>Your Company Name</p>
</body>
</html>
