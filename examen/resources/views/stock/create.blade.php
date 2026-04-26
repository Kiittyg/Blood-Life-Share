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
            margin-top: 20px;
        }

        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
        }

        h1 {
            font-weight: 800;
            color: #800000; /* Couleur rouge */
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 600;
            color: #800000; /* Couleur rouge */
        }

        .form-control {
            border-radius: 0.25rem;
            border-color: #ced4da; /* Couleur par défaut */
            background-color: #ffffff; /* Fond blanc */
        }

        .form-control:focus {
            border-color: #80bdff; /* Couleur bleue au focus */
            box-shadow: 0 0 0 0.2rem rgba(38,143,255,0.25); /* Ombre au focus */
        }

        .btn {
            border-radius: 0.25rem;
            color: #ffffff;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #800000; /* Couleur rouge */
            border-color: #800000;
        }

        .btn-primary:hover {
            background-color: #600000; /* Couleur rouge plus foncé au survol */
            border-color: #600000;
        }

        .btn-secondary {
            background-color: #800000; /* Couleur rouge */
            border-color: #800000;
        }

        .btn-secondary:hover {
            background-color: #600000; /* Couleur rouge plus foncé au survol */
            border-color: #600000;
        }

        .alert-danger {
            border-radius: 0.25rem;
            background-color: #ffe6e6; /* Fond rouge pâle */
            border-color: #800000; /* Bordure rouge */
        }

        .groupesanguin-item {
            border: 1px solid #800000; /* Bordure rouge */
            border-radius: 0.25rem;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #ffffff; /* Fond blanc */
        }

        .groupesanguin-item .form-group label {
            color: #800000; /* Couleur rouge pour les labels dans groupesanguin */
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Créer un Stock</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ajout.stock') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="totalstock">Total Stock</label>
            <input type="number" class="form-control" id="totalstock" name="totalstock" required>
        </div>
        <div class="form-group">
            <label for="responsablestock">Responsable Stock</label>
            <input type="text" class="form-control" id="responsablestock" name="responsablestock" required>
        </div>
        <div class="form-group">
            <label for="misajour">Mise à Jour</label>
            <input type="date" class="form-control" id="misajour" name="misajour" required>
        </div>
        <div class="form-group">
            <label for="niveaualerte">Niveau Alerte</label>
            <input type="number" class="form-control" id="niveaualerte" name="niveaualerte" required>
        </div>
        <div class="form-group">
            <label for="centre_id">Centre</label>
            <select class="form-control" id="centre_id" name="centre_id" required>
                <option value="">Sélectionner un centre</option>
                @foreach ($centre as $centres)
                    <option value="{{ $centres->id }}">{{ $centres->nom }}</option>
                @endforeach
            </select>
        </div>

        <h3>Groupes Sanguins</h3>
        <div id="groupesanguins">
            <div class="groupesanguin-item">
                <div class="form-group">
                    <label for="groupesanguin_id_0">Groupe Sanguin</label>
                    <select class="form-control" id="groupesanguin_id_0" name="groupesanguins[0][groupesanguin_id]" required>
                        <option value="">Sélectionner un groupe sanguin</option>
                        @foreach ($groupesanguin as $groupesanguins)
                            <option value="{{ $groupesanguins->id }}">{{ $groupesanguins->type }}{{ $groupesanguins->facteurrhesus }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantite_0">Quantité</label>
                    <input type="number" class="form-control" id="quantite_0" name="groupesanguins[0][quantite]" required>
                </div>
                <div class="form-group">
                    <label for="qualite_0">Qualité</label>
                    <input type="text" class="form-control" id="qualite_0" name="groupesanguins[0][qualite]" required>
                </div>
                <div class="form-group">
                    <label for="dateexp_0">Date d'Expiration</label>
                    <input type="date" class="form-control" id="dateexp_0" name="groupesanguins[0][dateexp]" required>
                </div>
                <div class="form-group">
                    <label for="typestockage_0">Type de Stockage</label>
                    <input type="text" class="form-control" id="typestockage_0" name="groupesanguins[0][typestockage]" required>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="add-groupesanguin">Ajouter Groupe Sanguin</button>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>

<script>
    let count = 1;
    document.getElementById('add-groupesanguin').addEventListener('click', function() {
        const groupesanguinsDiv = document.getElementById('groupesanguins');
        const newGroupesanguin = `
            <div class="groupesanguin-item">
                <div class="form-group">
                    <label for="groupesanguin_id_${count}">Groupe Sanguin</label>
                    <select class="form-control" id="groupesanguin_id_${count}" name="groupesanguins[${count}][groupesanguin_id]" required>
                        <option value="">Sélectionner un groupe sanguin</option>
                        @foreach ($groupesanguin as $groupesanguins)
                            <option value="{{ $groupesanguins->id }}">{{ $groupesanguins->type }}{{ $groupesanguins->facteurrhesus }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantite_${count}">Quantité</label>
                    <input type="number" class="form-control" id="quantite_${count}" name="groupesanguins[${count}][quantite]" required>
                </div>
                <div class="form-group">
                    <label for="qualite_${count}">Qualité</label>
                    <input type="text" class="form-control" id="qualite_${count}" name="groupesanguins[${count}][qualite]" required>
                </div>
                <div class="form-group">
                    <label for="dateexp_${count}">Date d'Expiration</label>
                    <input type="date" class="form-control" id="dateexp_${count}" name="groupesanguins[${count}][dateexp]" required>
                </div>
                <div class="form-group">
                    <label for="typestockage_${count}">Type de Stockage</label>
                    <input type="text" class="form-control" id="typestockage_${count}" name="groupesanguins[${count}][typestockage]" required>
                </div>
            </div>
        `;
        groupesanguinsDiv.insertAdjacentHTML('beforeend', newGroupesanguin);
        count++;
    });
</script>

</body>
</html>
