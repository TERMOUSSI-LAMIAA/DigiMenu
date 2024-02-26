<!DOCTYPE html>
<html>
<head>
    <title>Abonnement Updated</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>

    <p>We are writing to inform you that your Abonnement details have been updated successfully:</p>

    <ul>
        <li><strong>Type:</strong> {{ $abonnement->type }}</li>
        <li><strong>you Started at :</strong> {{ $user->start_date_abonnement }}</li>
        <li><strong>Number of Articles:</strong> {{ $abonnement->nbr_article }}</li>
        <li><strong>Type of Media:</strong> {{ $abonnement->type_media }}</li>
        <li><strong>Number of Scans:</strong> {{ $abonnement->nbr_scan }}</li>
    </ul>

    <p>If you have any questions or concerns, please don't hesitate to contact us.</p>

    <p>Thank you!</p>
</body>
</html>
