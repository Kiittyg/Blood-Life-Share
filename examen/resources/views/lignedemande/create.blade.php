<!DOCTYPE html>
<html>
<head>
    <title>Créer une nouvelle demande de don</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
            max-width: 700px;
            padding: 20px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #8B0000;
        }

        .form-control {
            border: none;
            padding: 10px;
            border-radius: 5px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
            width: calc(100% - 160px);
            margin-left: 160px;
            background-color: #F6F7EE; /* Ajout du fond de couleur spécifié */
        }

        .btn-primary {
            background-color: #8B0000;
            color: white;
            border: none;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary:hover {
            color: #8B0000; /* Change la couleur du texte au survol */
        }

        .logo img {
            width: 80px; /* Ajuste la taille du logo */
            margin-bottom: 20px; /* Ajoute une marge en bas du logo */
            display: block; /* Assure que l'image est centrée horizontalement */
            margin-left: auto;
            margin-right: auto;
        }

        .logo {
            text-align: center; /* Centrer horizontalement le contenu du div */
            margin-bottom: 20px; /* Ajouter une marge en bas du logo */
        }
        h1 {
            font-size: 28px; /* Ajuste la taille de la police */
            text-align: center; /* Centre le texte */
            margin-bottom: 10px; /* Ajoute une marge en bas du titre */
        }
        .btn-back svg {
            width: 24px;
            height: 24px;
            fill: currentColor;
            margin-right: 5px;
        }
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #8B0000;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<a href="{{ route('home') }}" class="btn-back">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
    <div class="container mt-5">
    <h1 class="text-center">Formuler_une_nouvelle_demande_de_don</h1>
        <div class="logo">
            <img src="images/demande.jpg" alt="Logo"> <!-- Remplacer 'path_to_your_logo_image.png' par le chemin de votre logo -->
        </div>
        

        <form action="{{ route('ajout.lignedemande') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nomdemandeur" class="form-label">Nom du Demandeur</label>
                <input type="text" class="form-control" id="nomdemandeur" name="nomdemandeur" required>
            </div>

            <div class="form-group">
                <label for="statut" class="form-label">Statut</label>
                <input type="text" class="form-control" id="statut" name="statut" required>
            </div>

            <div class="form-group">
                <label for="lieu" class="form-label">Lieu</label>
                <input type="text" class="form-control" id="lieu" name="lieu" required>
            </div>

            <div class="form-group">
                <label for="nbdonneurs" class="form-label">Nombre de Donneurs</label>
                <input type="number" class="form-control" id="nbdonneurs" name="nbdonneurs" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</body>
</html>
