<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #8B0000;
        }

        .form-control {
            border: none;
            padding: 10px;
            border-radius: 5px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
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
            width: 150px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"], select.form-select {
            background-color: #F6F7EE;
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

        .btn-back:hover {
            background-color: #6d0000;
        }

        .btn-back svg {
            width: 24px;
            height: 24px;
            fill: currentColor;
            margin-right: 5px;
        }
        h1 {
            color:black;
            text-align: center;
            margin-bottom: 20px;
            font-size:20px;
        }
    </style>
    <title>Ajouter un Don</title>
</head>
<body>

    <a href="{{ route('don.index') }}" class="btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
    
    <div class="container mt-7">
    <h1>Consigner_Un_Don</h1>
        <div class="logo">
            <img src="images/donsang.avif" alt="Logo">
        </div>
        <form action="{{ route('ajout.don') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="centrehospitalier_id" class="form-label">Centre Hospitalier</label>
                <select name="centrehospitalier_id" class="form-select" required>
                    @foreach ($centrehospitalier as $centre)
                        <option value="{{ $centre->id }}">{{ $centre->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-soumettre">Enregistrer</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
