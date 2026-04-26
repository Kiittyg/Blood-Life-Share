<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Rendez-vous</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: black;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #8B0000;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            color: #8B0000;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .btn-soumettre {
            background-color: #8B0000;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-soumettre:hover {
            opacity: 0.8;
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier le Rendez-vous</h2>
        <form action="{{ route('update.lignerv', $lignerv->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indique que la requête est une mise à jour -->
            
            <div class="form-group">
                <label for="daterv" class="form-label">Date du rendez-vous</label>
                <input type="date" name="daterv" id="daterv" class="form-control" value="{{ old('daterv', $lignerv->daterv) }}" required>
            </div>
            <div class="form-group">
                <label for="heurerv" class="form-label">Heure du rendez-vous</label>
                <input type="time" name="heurerv" id="heurerv" class="form-control" value="{{ old('heurerv', $lignerv->heurerv) }}" required>
            </div>
            <button type="submit" class="btn-soumettre">Mettre à Jour</button>
            <a href="{{ route('lignerv.index') }}" class="btn-back">Retour</a>
        </form>
    </div>
</body>
</html>
