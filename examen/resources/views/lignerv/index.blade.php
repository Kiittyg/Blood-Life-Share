<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #8B0000;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-back {
            display: inline-block;
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .btn-back:hover {
            opacity: 0.8;
        }

        .logo img {
            width: 150px;
            display: block;
            margin: 0 auto 20px;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-right: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .btn-warning {
            background-color: #007bff; /* Couleur de fond pour Modifier */
        }

        .btn-danger {
            background-color: #dc3545; /* Couleur de fond pour Supprimer */
        }
    </style>
    <title>Répertoire des Rendez-vous</title>
</head>
<body>
<a href="{{ route('home') }}" class="btn-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
            
        </a>
    <div class="container">
        

        <div class="logo">
            <img src="images/rdv.jpg" alt="Logo">
        </div>
        <h2></h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="accordion" id="accordionExample">
            @foreach($lignerv as $rv)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $rv->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $rv->id }}" aria-expanded="true" aria-controls="collapse{{ $rv->id }}">
                            {{ $rv->donneur->prenom }} {{ $rv->donneur->nom }}
                        </button>
                    </h2>
                    <div id="collapse{{ $rv->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $rv->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><strong>Date:</strong> {{ $rv->daterv }}</p>
                            <p><strong>Heure:</strong> {{ $rv->heurerv }}</p>
                            <p><strong>Lieu:</strong> {{ $rv->rendezvous->demandedon ? $rv->rendezvous->demandedon->lieu : 'Non spécifié' }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('edit.lignerv', $rv->id) }}" class="btn-back">Modifier</a>
                                <a href="{{ route('supprimer.lignerv', $rv->id) }}" class="btn-back">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        // Fonction pour créer une notification
        function createNotification(title, body) {
            if ('Notification' in window) {
                Notification.requestPermission().then(function(permission) {
                    if (permission === 'granted') {
                        new Notification(title, {
                            body: body,
                            icon: 'images/icone.png' // Chemin vers une icône
                        });
                    }
                });
            }
        }

        // Afficher les notifications pour chaque rendez-vous
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($lignerv as $rv)
                createNotification(
                    'Rappel de Rendez-vous',
                    `Vous avez un rendez-vous de don de sang prévu le {{ $rv->daterv }} à {{ $rv->heurerv }}.`
                );
            @endforeach
        });
    </script>
</body>
</html>
