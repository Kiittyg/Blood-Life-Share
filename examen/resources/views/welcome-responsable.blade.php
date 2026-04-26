<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Accueil Responsable</title>
    <style>
        body {
            background-color: white;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 600px;
            padding: 20px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
        }
        .title {
            font-weight: bold;
            color: #8B0000;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Accueil Responsable</h2>
        <p>Bonjour, {{ $nom }} (ID: {{ $responsable_id }}),</p>
        <p>Bienvenue sur votre espace responsable.</p>
        <!-- Ajoutez ici des informations spécifiques pour les responsables -->
    </div>
</body>
</html>
