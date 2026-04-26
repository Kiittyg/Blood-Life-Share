<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Répertoire des Stocks de Sang</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .btn-back {
            display: inline-block;
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 10px 20px;
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
            width: 120px;
            display: block;
            margin: 0 auto 20px;
        }

        h2 {
            color: #8B0000;
            text-align: center;
            margin-bottom: 30px;
        }

        .accordion-button {
            background-color: #8B0000;
            color: white;
            border: none;
        }

        .accordion-button:not(.collapsed) {
            color: white;
            background-color: #6a0f0f;
        }

        .accordion-body {
            background-color: #fff;
            color: #333;
            border-top: 1px solid #dee2e6;
        }

        .btn {
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
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

        .btn-warning:hover {
            background-color: #0056b3;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<a href="{{ route('home') }}" class="btn-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
            
        </a>
    <div class="container">
 

        <div class="accordion" id="stockgsAccordion">
            @foreach ($stockgs as $sg)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $sg->id }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $sg->id }}" aria-expanded="true" aria-controls="collapse{{ $sg->id }}">
                        Groupe Sanguin: {{ $sg->groupesanguin->type }} {{ $sg->groupesanguin->facteurrhesus }}
                    </button>
                </h2>
                <div id="collapse{{ $sg->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $sg->id }}" data-bs-parent="#stockgsAccordion">
                    <div class="accordion-body">
                        <p><strong>Total Stock:</strong> {{ $sg->stock->totalstock }}</p>
                        <p><strong>Quantité:</strong> {{ $sg->quantite }}</p>
                        <p><strong>Qualité:</strong> {{ $sg->qualite }}</p>
                        <p><strong>Date d'Expiration:</strong> {{ $sg->dateexp }}</p>
                        <p><strong>Type de Stockage:</strong> {{ $sg->typestockage }}</p>
                        <a href="{{ route('edit.stockgs', $sg->id) }}" class="btn-back">Modifier</a>
                        <a href="{{ route('supprimer.stockgs', $sg->id) }}" class="btn-back">Supprimer</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
