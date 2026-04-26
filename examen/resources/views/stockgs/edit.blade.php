<!-- resources/views/stockgs/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier Stock</title>
    <style>
        body {
            background-color: white;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
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
            margin-bottom: 20px;
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

        .btn-soumettre:hover {
            color: #8B0000;
        }

        .logo img {
            width: 100px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="time"], input[type="number"] {
            background-color: #F6F7EE;
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
    <div class="logo">
            <img src="{{ asset('images/28.jpg') }}" alt="Logo">
        </div>
       
       
        <form action="{{ route('update.stockgs', $stockgs) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="groupesanguin_id" class="form-label">Groupe Sanguin</label>
                <select name="groupesanguin_id" class="form-select" required>
                    @foreach ($groupesanguin as $groupesanguins)
                        <option value="{{ $groupesanguins->id }}" {{ $groupesanguins->id == $stockgs->groupesanguin_id ? 'selected' : '' }}>{{ $groupesanguins->type }} {{ $groupesanguins->facteurrhesus }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="stock_id" class="form-label">Stock</label>
                <select name="stock_id" class="form-select" required>
                    @foreach ($stock as $stocks)
                        <option value="{{ $stocks->id }}" {{ $stocks->id == $stockgs->stock_id ? 'selected' : '' }}>Total stock:{{ $stocks->totalstock }} ; Stock numero: {{ $stocks->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantite" class="form-label">Quantité</label>
                <input type="text" name="quantite" class="form-control" value="{{ $stockgs->quantite }}" required>
            </div>
            <div class="form-group">
                <label for="qualite" class="form-label">Qualité :</label>
                <select id="qualite" name="qualite" class="form-control" required>
                    <option value="plasma" {{ $stockgs->qualite == 'plasma' ? 'selected' : '' }}>Plasma</option>
                    <option value="globule_rouge" {{ $stockgs->qualite == 'globule_rouge' ? 'selected' : '' }}>Globules Rouge</option>
                    <option value="plaquettes" {{ $stockgs->qualite == 'plaquettes' ? 'selected' : '' }}>Plaquettes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateexp" class="form-label">Date d'Expiration</label>
                <input type="date" name="dateexp" class="form-control" value="{{ $stockgs->dateexp }}" required>
            </div>
            <div class="form-group">
                <label for="typestockage" class="form-label">Type Stockage :</label>
                <select id="typestockage" name="typestockage" class="form-control" required>
                    <option value="refrigerateur" {{ $stockgs->typestockage == 'refrigerateur' ? 'selected' : '' }}>Refrigerateur</option>
                    <option value="congelateur" {{ $stockgs->typestockage == 'congelateur' ? 'selected' : '' }}>Congelateur</option>
                    <option value="incubateurs" {{ $stockgs->typestockage == 'incubateurs' ? 'selected' : '' }}>Incubateurs</option>
                    <option value="Lyophilisateurs" {{ $stockgs->typestockage == 'Lyophilisateurs' ? 'selected' : '' }}>Lyophilisateurs</option>
                    <option value="Agitateurs de plaquettes" {{ $stockgs->typestockage == 'Agitateurs de plaquettes' ? 'selected' : '' }}>Agitateurs de plaquettes</option>
                </select>
            </div>
            <button type="submit" class="btn-soumettre">Enregistrer les Modifications</button>
        </form>
    </div>
</body>
</html>
