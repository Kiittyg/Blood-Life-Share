<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Dons</title>
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
            font-size:30px;
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

        .logo img {
            width: 90px; /* Adjust the logo size */
        }

        .logo {
            text-align: center; /* Center the content horizontally */
            margin-bottom: 20px; /* Add margin at the bottom of the logo */
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

        .btn-warning {
            background-color: #007bff; /* Background color for Edit */
        }

        .btn-danger {
            background-color: #dc3545; /* Background color for Delete */
        }
        .btn-back {
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
        .btn-back svg {
            width: 12px;
            height: 12px;
            background-color: #8B0000;

        }
    </style>
</head>
<body>
<a href="{{ route('home') }}" class="btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
        <div class="logo">
            <img src="images/5.jpg" alt="Logo">
        </div>
        <h2>Répertoire_des_Dons</h2>
        <a href="{{ route('enregistrer.don') }}" class="btn">Ajouter un Don</a>
        <table border="0">
            <tr>
                <th>ID</th>
                <th>Centre Hospitalier</th>
                <th>Actions</th>
            </tr>
            @foreach($don as $dons)
            <tr>
                <td>{{ $dons->id }}</td>
                <td>{{ $dons->centrehospitalier->nom }}</td>
                <td>
                    <a href="{{ route('edit.don', $dons->id) }}" class="btn btn-warning">Modifier</a>
                    <a href="{{ route('supprimer.don', $dons->id) }}" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
