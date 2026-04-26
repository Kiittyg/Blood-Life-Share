<!-- resources/views/groupe_sanguins/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Créer un Groupe Sanguin</title>
</head>
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

        .alert {
            margin-top: 20px;
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
        .btn-soumettre {
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
        .logo img {
            width: 90px; /* Ajuste la taille du logo */
           
            /* Ajoute une marge en bas du logo */
        }
        .logo {
    text-align: center; /* Centrer horizontalement le contenu du div */
    margin-bottom: 20px; /* Ajouter une marge en bas du logo */
}
input[type="text"] {
    background-color: 	#F6F7EE;
}
   .btn-back:hover {
            color: #8B0000;
        }
        .btn-back svg {
            width: 24px;
            height: 24px;
            fill: currentColor;
            margin-right: 5px;
        }
        h1 {
            color: black;
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }
    </style>
<body>
<a href="{{ route('home') }}" class="btn-back">
<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
<div class="container mt-5">
    <h1>Enregistrement_de_Groupe_Sanguin</h1>
<div class="logo">
        <img src="images/grou.webp" alt="Logo">
    </div>
    <form action="{{ route('enregistrer.groupesanguin') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="facteurrhesus" class="form-label">Facteur Rhésus</label>
            <input type="text" name="facteurrhesus" class="form-control" required>
        </div>
        <button type="submit" class="btn-soumettre">Enregistrer</button>
    </form>
</div>
</body>
</html>
