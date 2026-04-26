<!DOCTYPE html>
<html>
<head>
    <title>Créer une nouvelle ligne de demande de don</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
            max-width: 700px;
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
            background-color: #F6F7EE;
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
            background-color: white;
            border: 1px solid #8B0000;
        }

        .logo img {
            width: 90px;
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

        h2 {
            color: #8B0000;
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
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
<div class="container">
    <h2>Formuler_une_nouvelle_demande_de_don</h2>
    <div class="logo">
            <img src="images/demande.jpg" alt="Logo"> <!-- Remplacer 'path_to_your_logo_image.png' par le chemin de votre logo -->
        </div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('ajout.lignedemandedon') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="centrehospitalier_id" class="form-label">Centre Hospitalier</label>
            <select name="centrehospitalier_id" id="centrehospitalier_id" class="form-control" required>
                @foreach ($centrehospitalier as $centrehospitaliers)
                    <option value="{{ $centrehospitaliers->id }}">{{ $centrehospitaliers->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="demandedon_id" class="form-label">Demande de Don</label>
            <select name="demandedon_id" id="demandedon_id" class="form-control" required>
                @foreach ($demandedon as $demandedons)
                    <option value="{{ $demandedons->id }}">{{ $demandedons->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="datedemande" class="form-label">Date de la Demande</label>
            <input type="date" name="datedemande" id="datedemande" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="heuredemande" class="form-label">Heure de la Demande</label>
            <input type="time" name="heuredemande" id="heuredemande" class="form-control" required>
        </div>

        <button type="submit" class="btn-soumettre">Enregistrer</button>
    </form>
</div>
</body>
</html>
