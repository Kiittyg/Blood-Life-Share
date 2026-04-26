<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Fonctions</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Styles personnalisés */
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: white;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
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

        .btn-warning {
            background-color: #007bff; /* Couleur de fond pour Modifier */
        }

        .btn-danger {
            background-color: #dc3545; /* Couleur de fond pour Supprimer */
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
            text-align: center; /* Centre le contenu horizontalement */
            margin-bottom: 20px;
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
        
        h2{
            color: #8B0000;
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }
        
    </style>
</head>
<body>
<a href="{{ route('home') }}" class="btn-back">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16" >
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
        <div class="logo">
            <img src="images/5.jpg" alt="Logo">
        </div>
        <h2>Répertoire_des_Fontions</h2>
        <a href="{{ route('enregistrer.fonction') }}" class="btn btn-success mb-3">Ajouter une Fonction</a>

        @if ($fonction->isEmpty())
            <p>Aucune fonction n'a été créée.</p>
        @else
            <table border="0">
                <thead>
                    <tr>
                        <th>Centre Hospitalier</th>
                        <th>Responsable</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fonction as $fonctions)
                        <tr>
                            <td>{{ $fonctions->centrehospitalier->nom }}</td>
                            <td>{{ $fonctions->responsable->code_unique }}</td>
                            <td>{{ $fonctions->datedebut }}</td>
                            <td>{{ $fonctions->datefin }}</td>
                            <td>
                                <a href="{{ route('edit.fonction', $fonctions->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('supprimer.fonction', $fonctions->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette fonction ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
