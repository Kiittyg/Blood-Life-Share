<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une demande de don</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
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

        h1 {
            color: #8B0000;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            color: #8B0000;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #8B0000;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .form-label {
            font-weight: bold;
            color: #8B0000;
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

        .btn-edit {
            background-color: #007bff;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .logo img {
            width: 80px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
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
        <h1>Créer une demande de don</h1>
        <div class="logo">
            <img src="images/demande.jpg" alt="Logo">
        </div>
        <form action="{{ route('enregistrer.demandedon') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomdemandeur" class="form-label">Nom du demandeur</label>
                <input type="text" class="form-control" id="nomdemandeur" name="nomdemandeur" required>
            </div>
            <div class="form-group">
                <label for="statut" class="form-label">Statut</label>
                <input type="text" class="form-control" id="statut" name="statut" required>
            </div>
            <div class="form-group">
                <label for="lieu" class="form-label">Lieu</label>
                <input type="text" class="form-control" id="lieu" name="lieu" required>
            </div>
            <div class="form-group">
                <label for="nbdonneurs" class="form-label">Nombre de donneurs</label>
                <input type="number" class="form-control" id="nbdonneurs" name="nbdonneurs" required>
            </div>
            <div class="form-group">
                <label for="groupesanguin_id" class="form-label">Groupe Sanguin</label>
                <select class="form-control" id="groupesanguin_id" name="groupesanguin_id" required>
                    @foreach($groupesanguin as $groupesanguins)
                        <option value="{{ $groupesanguins->id }}">{{ $groupesanguins->type }} ({{ $groupesanguins->facteurrhesus }})</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn">Enregistrer</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
