<!DOCTYPE html>
<html>
<head>
    <title>Liste des Demandes de Don</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #8B0000;
            text-align: center;
            margin-bottom: 20px;
            font-size: 36px;
            font-weight: bold;
        }

        .btn {
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #600000;
        }

        .btn-warning {
            background-color: #007bff;
        }

        .btn-warning:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-back {
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-back svg {
            width: 16px;
            height: 16px;
            vertical-align: middle;
            margin-right: 5px;
        }

        .logo img {
            width: 100px;
            border-radius: 50%;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #8B0000;
            color: white;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('home') }}" class="btn-back">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
            Retour
        </a>

        <div class="logo">
            <img src="images/5.jpg" alt="Logo">
        </div>

        <h2>Répertoire des Demandes de Don</h2>

        <a href="{{ route('ajout.demandedon') }}" class="btn">Nouvelle Demande de Don</a>

        @if ($lignedemande->isEmpty())
            <p class="text-center">Aucune demande de don n'a été créée.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Donneur</th>
                        <th>Nom Demandeur</th>
                        <th>Statut</th>
                        <th>Lieu</th>
                        <th>Nombre Donneurs</th>
                        <th>Groupe Sanguin</th>
                        <th>Date Demande</th>
                        <th>Heure Demande</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lignedemande as $ligne)
                        <tr>
                            <td>{{ $ligne->id }}</td>
                            <td>{{ $ligne->donneur_id }}</td>
                            <td>{{ $ligne->demandedon->nomdemandeur ?? 'N/A' }}</td> 
                            <td>{{ $ligne->demandedon->statut ?? 'N/A' }}</td> 
                            <td>{{ $ligne->demandedon->lieu ?? 'N/A' }}</td> 
                            <td>{{ $ligne->demandedon->nbdonneurs ?? 'N/A' }}</td> 
                            <td>{{ $ligne->demandedon->groupesanguin->type ?? 'N/A' }} {{ $ligne->demandedon->groupesanguin->facteurrhesus ?? 'N/A' }}</td> 
                            <td>{{ $ligne->datedemande }}</td>
                            <td>{{ $ligne->heuredemande }}</td>
                            <td class="actions">
                                <a href="{{ route('edit.demandedon',$ligne->demandedon->id) }}" class="btn btn-warning">Modifier</a>
                                <a href="{{ route('supprimer.lignedemande', $ligne->demandedon->id) }}" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
