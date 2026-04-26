<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des Stocks</title>
    <style>
        .accordion-button:not(.collapsed) {
            color: #fff;
            background-color: #800000; /* Couleur rouge */
            border-color: #800000; /* Bordure rouge */
        }
        .accordion-button {
            background-color: #f8d7da; /* Fond de la bande non active */
            border-color: #800000; /* Bordure rouge */
            color: #800000; /* Texte rouge */
        }
        .accordion-body {
            font-size: 16px; /* Augmenter la taille de la police */
        }
        .groupesanguin-item {
            margin-bottom: 10px; /* Espacer les éléments de groupe sanguin */
            font-weight: bold; /* Mettre en gras */
        }
        .quantite {
            font-size: 14px; /* Taille de police plus petite pour la quantité */
            color: #6c757d; /* Couleur de texte moins dominante */
        }
        .alert-danger {
            color: #dc3545;
            font-weight: bold; /* Mettre en gras */
        }
        .alert-success {
            color: #28a745;
            font-weight: bold; /* Mettre en gras */
        }
        .btn-icon {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<a href="{{ route('home') }}" class="btn-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
    </a>
<div class="container">
    
    <div class="container mt-4">
        <h1></h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="accordion" id="stockAccordion">
            @foreach ($stock as $stocks)
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="heading{{ $stocks->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $stocks->id }}" aria-expanded="true" aria-controls="collapse{{ $stocks->id }}">
                            Centre: {{ $stocks->centre->nom }} | Total Stock: {{ $stocks->totalstock }}
                        </button>
                    </h2>
                    <div id="collapse{{ $stocks->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $stocks->id }}" data-bs-parent="#stockAccordion">
                        <div class="accordion-body">
                           
                            @if ($stocks->groupesanguins->isNotEmpty())
                                <ul class="list-unstyled">
                                    @foreach ($stocks->groupesanguins as $stockgs)
                                        <li class="groupesanguin-item">
                                            Groupe Sanguin: {{ $stockgs->groupesanguin->type }} {{ $stockgs->groupesanguin->facteurrhesus }}
                                            <div class="quantite">
                                                Quantité: {{ $stockgs->quantite }} poches
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Aucun groupe sanguin disponible</p>
                            @endif
                            <p>
                                <strong>État du Stock:</strong>
                                @if ($stocks->groupesanguins->sum('quantite') <= $stocks->niveaualerte)
                                    <span class="alert-danger">Alerte!</span>
                                @else
                                    <span class="alert-success">OK</span>
                                @endif
                            </p>
                            <a href="{{ route('edit.stock', $stocks->id) }}" class="btn btn-warning">Modifier</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
