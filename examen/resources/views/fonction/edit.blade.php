<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Fonction</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: white;
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
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.8;
        }

        label {
            font-weight: bold;
        }
        .logo img {
            width: 100px; /* Ajuste la taille du logo */
           
            /* Ajoute une marge en bas du logo */
        }
        .logo {
    text-align: center; /* Centrer horizontalement le contenu du div */
    margin-bottom: 20px; /* Ajouter une marge en bas du logo */
}
    </style>
</head>
<body>
    <div class="container">
    <div class="logo">
            <img src="{{ asset('images/28.jpg') }}" alt="Logo">
        </div>
        <h2>Modifier une Fonction</h2>
        <form action="{{ route('update.fonction', $fonction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="centrehospitalier_id" class="form-label">Centre Hospitalier</label>
                <select name="centrehospitalier_id" class="form-select" required>
                    @foreach ($centrehospitalier as $centre)
                        <option value="{{ $centre->id }}" {{ $fonction->centrehospitalier_id == $centre->id ? 'selected' : '' }}>{{ $centre->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="responsable_id" class="form-label">Responsable</label>
                <select name="responsable_id" class="form-select" required>
                    @foreach ($responsable as $responsables)
                        <option value="{{ $responsables->id }}" {{ $fonction->responsable_id == $responsables->id ? 'selected' : '' }}>{{ $responsables->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="datedebut" class="form-label">Date Début</label>
                <input type="date" class="form-control" id="datedebut" name="datedebut" value="{{ $fonction->datedebut }}" required>
            </div>
            <div class="mb-3">
                <label for="datefin" class="form-label">Date Fin</label>
                <input type="date" class="form-control" id="datefin" name="datefin" value="{{ $fonction->datefin }}" required>
            </div>
            <button type="submit" class="btn">Enregistrer les modifications</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
