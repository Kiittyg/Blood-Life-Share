<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Don</title>
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
        h1 {
            color: #8B0000;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 20px;
            color: #8B0000;
            text-decoration: none;
            font-size: 16px;
        }
        .btn-back svg {
            vertical-align: middle;
        }
        .form-label {
            font-weight: bold;
            color: #8B0000;
        }
        .btn-soumettre {
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }
        .btn-soumettre:hover {
            opacity: 0.8;
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
    <a href="{{ route('don.index') }}" class="btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
    
    <div class="container mt-5">
        <h1>Modifier un Don</h1>
        <div class="logo">
            <img src="{{ asset('images/28.jpg') }}" alt="Logo">
        </div>
        <form action="{{ route('update.don', $don->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="centrehospitalier_id" class="form-label">Centre Hospitalier</label>
                <select name="centrehospitalier_id" id="centrehospitalier_id" class="form-select" required>
                    @foreach ($centrehospitalier as $centre)
                        <option value="{{ $centre->id }}" {{ $centre->id == $don->centrehospitalier_id ? 'selected' : '' }}>
                            {{ $centre->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-soumettre">Mettre à jour</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
