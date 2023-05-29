<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        h1 {
            color: #333333;
        }
        
        ul {
            list-style-type: none;
            padding: 0;
        }
        
        li {
            margin-bottom: 10px;
        }
        
        li strong {
            font-weight: bold;
        }
        
        p {
            color: #555555;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulaire de contact sur votre Portefolio</h1>
        <p>Bonjour, <br> Vous avez reçu une nouvelle demande de contact. Voici les informations renseignées :</p>
        
        <ul>
            <li><strong>Nom :</strong> {{ $name }}</li>
            <li><strong>Email :</strong> {{ $email }}</li>
            <li><strong>Sujet :</strong> {{ $subject }}</li>
            <li><strong>Message :</strong> {{ $message }}</li>
        </ul>
        
        <p>Merci de prendre les mesures nécessaires pour répondre à cette demande.</p>
        
        <p>Cordialement,</p>
        <p>L'équipe de votre entreprise</p>
    </div>
</body>
</html>
