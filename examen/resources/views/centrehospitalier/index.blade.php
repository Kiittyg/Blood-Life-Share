<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
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
            width: 90px; /* Ajuste la taille du logo */
        }

        .logo {
            text-align: center; /* Centrer horizontalement le contenu du div */
            margin-bottom: 20px; /* Ajouter une marge en bas du logo */
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
            background-color: #007bff; /* Couleur de fond pour Modifier */
        }

        .btn-danger {
            background-color: #dc3545; /* Couleur de fond pour Supprimer */
        }
    </style>
    <title>Liste des Centres Hospitaliers</title>
</head>
<body>
    
        <div class="logo">
            <img src="images/5.jpg" alt="Logo">
        </div>
        <h2>Liste_des_Centres_Hospitaliers</h2>
        <a href="{{ route('enregistrer.centrehospitalier') }}" class="btn">Ajouter un Centre</a>
        <table border="0">
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Localité</th>
                <th>Actions</th>
            </tr>
            @foreach($centrehospitalier as $centre)
            <tr>
                <td>{{ $centre->nom }}</td>
                <td>{{ $centre->email }}</td>
                <td>{{ $centre->telephone }}</td>
                <td>{{ $centre->localite->nom }}</td>
                <td>
                    
                <a href="{{ route('edit.centrehospitalier', $centre->id) }}">Modifier</a>
                        <a href="{{ route('supprimer.centrehospitalier', $centre->id) }}">Supprimer</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
