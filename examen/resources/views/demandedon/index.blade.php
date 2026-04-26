<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Demandes de Don</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', serif;
            margin: 0;
            padding: 0;
            overflow: auto;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            filter: blur(10px);
            z-index: -1;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background-color:#8B0000;
            border-radius: 15px;
            border: 2px solid #8B0000;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }

        h1 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            color: #8B0000;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
        }

        .btn {
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-right: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #a52a2a;
        }

        .btn-edit, .btn-delete {
            background-color: #8B0000;
        }

        .logo img {
            width: 90px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            color: #8B0000;
            text-align: center;
            margin-bottom: 20px;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            color: black;
            font-size: 1.5em;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .card-actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <a href="{{ route('home') }}" class="btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        
    </a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div class="container">
    <div class="logo">
            <img src="images/5.jpg" alt="Logo">
        </div>
        <div class="row">
            @foreach($demandedon as $demande)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $demande->nomdemandeur }}</h5>
                            <p class="card-text"><strong>Lieu:</strong> {{ $demande->lieu }}</p>
                            <p class="card-text"><strong>Statut:</strong> {{ $demande->statut }}</p>
                            <p class="card-text"><strong>Nombre de Donneurs:</strong> {{ $demande->nbdonneurs }}</p>
                            <p class="card-text"><strong>Groupe Sanguin:</strong> {{ $demande->groupesanguin->type }} {{ $demande->groupesanguin->facteurrhesus }}</p>
                            <div class="card-actions">
                                <a href="{{ route('edit.demandedon', $demande->id) }}" class="btn btn-edit">Modifier</a>
                                <a href="{{ route('supprimer.demandedon', $demande->id) }}" class="btn btn-delete">Supprimer</a>
                                <a href="{{ route('ajout.lignerv', ['demandedon_id' => $demande->id]) }}" class="btn">Je suis ton héros</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
