<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <a href="{{ route('home') }}" class="btn-back">

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

        .form-group {
            margin-bottom: 20px; /* Ajoute une marge en bas des groupes de formulaire */
        }

        .form-label {
            font-weight: bold;
            color: #8B0000; /* Couleur rouge pour les étiquettes de formulaire */
        }

        .form-control {
            border: none;
            padding: 10px;
            border-radius: 5px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
            width: calc(100% - 160px);
            margin-left: 160px;
        }

        .btn-soumettre {
            background-color: #8B0000; /* Fond rouge pour les boutons */
            color: white; /* Texte blanc pour les boutons */
            border: none;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-soumettre:hover {
            color: #8B0000; /* Changement de couleur du texte au survol */
        }

        .logo img {
            width: 90px; /* Ajuste la taille du logo */
        }

        .logo {
            text-align: center; /* Centrer horizontalement le contenu du div */
            margin-bottom: 20px; /* Ajouter une marge en bas du logo */
        }

        input[type="date"] {
            background-color:#F6F7EE; /* Couleur de fond pour les champs texte */
        }
        input[type="time"] {
            background-color:#F6F7EE; /* Couleur de fond pour les champs texte */
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
    </style>
</head>

<body>
<a href="{{ route('home') }}" class="btn-back">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16" >
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
    </a>
<div class="container">
    <div class="logo">
        <img src="images/e.avif" alt="Logo">
    </div>
    <form action="{{ route('ajout.rendezvous') }}" method="POST">
        @csrf
        
        <!--div class="form-group">
            <label for="lignerv_id" class="form-label">Sélectionner une ligne de rendez-vous (lignerv)</label>
            <select name="lignerv_id" id="lignerv_id" class="form-control" required>
                @foreach ($lignerv as $lignerv)
                    <option value="{{ $lignerv->id }}">{{ $lignerv->id }}</option>
                @endforeach
            </select>
        </div-->
        <div class="form-group">
            <label for="daterv" class="form-label">Date du rendez-vous</label>
            <input type="date" name="daterv" id="daterv" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="heurerv" class="form-label">Heure du rendez-vous</label>
            <input type="time" name="heurerv" id="heurerv" class="form-control" required>
        </div>
        <button type="submit" class="btn-soumettre">Prendre Rendez-vous</button>
    </form>
</div>
</body>
</html>
