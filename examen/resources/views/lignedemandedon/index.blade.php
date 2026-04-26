<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Demandes de Don</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-family: 'Roboto', sans-serif;
            color: #8B0000;
            margin-bottom: 30px;
            font-size: 32px;
            font-weight: 500;
            text-align: center;
        }

        .btn {
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            padding: 12px 20px;
            margin-right: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary {
            background-color: #8B0000;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #8B0000;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-back {
            background-color: #8B0000;
            color: #ffffff;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        .logo img {
            width: 140px;
            border-radius: 50%;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .accordion-button {
            border-radius: 8px;
            font-size: 16px;
        }

        .accordion-button:not(.collapsed) {
            color: #ffffff;
            background-color: #8B0000;
        }

        .accordion-body {
            padding: 20px;
        }

        .accordion-body p {
            margin-bottom: 10px;
        }

        .card-actions {
            text-align: right;
            padding: 15px;
        }

        .card-actions a {
            margin-left: 10px;
            font-size: 14px;
            text-decoration: none;
        }

        .card-actions svg {
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('home') }}" class="btn btn-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
            Retour
        </a>
        <div class="logo">
            <img src="images/5.jpg" alt="Logo">
        </div>
        <h2>Répertoire des Demandes de Don</h2>
        
        @if(isset($lignedemandedon) && $lignedemandedon->count() > 0)
            <div class="accordion" id="accordionExample">
                @foreach ($lignedemandedon as $index => $lignedemandedons)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                Demande {{ $index + 1 }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><strong>Centre Hospitalier :</strong> {{ $lignedemandedons->centrehospitalier_id }}</p>
                                <p><strong>Nom Demandeur :</strong> {{ $lignedemandedons->demandedon->nomdemandeur }}</p>
                                <p><strong>Statut :</strong> {{ $lignedemandedons->demandedon->statut ?? 'N/A' }}</p>
                                <p><strong>Lieu :</strong> {{ $lignedemandedons->demandedon->lieu ?? 'N/A' }}</p>
                                <p><strong>Nombre Donneurs :</strong> {{ $lignedemandedons->demandedon->nbdonneurs ?? 'N/A' }}</p>
                                <p><strong>Groupe Sanguin :</strong> {{ $lignedemandedons->demandedon->groupesanguin->type ?? 'N/A' }} {{ $lignedemandedons->demandedon->groupesanguin->facteurrhesus ?? 'N/A' }}</p>
                                <p><strong>Date de la Demande :</strong> {{ $lignedemandedons->datedemande }}</p>
                                <p><strong>Heure de la Demande :</strong> {{ $lignedemandedons->heuredemande }}</p>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('edit.demandedon', $lignedemandedons->demandedon->id) }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v6a1.5 1.5 0 0 0 1.5 1.5h6a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1 13.5z"/>
                                    </svg>
                                    Modifier
                                </a>
                                <a href="{{ route('supprimer.demandedon', $lignedemandedons->demandedon->id) }}" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5h1zm3 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5h1zm3.5-.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5h1zm-7.5-1a.5.5 0 0 1 .5.5v1H13V4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1h1.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H1.5a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5H3V4a.5.5 0 0 1 .5-.5h1zm4 0a.5.5 0 0 1 .5.5v1H6V4a.5.5 0 0 1 .5-.5h4z"/>
                                    </svg>
                                    Supprimer
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Aucune demande de don trouvée.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
