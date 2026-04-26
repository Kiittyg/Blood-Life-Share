<!-- resources/views/groupesanguin/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Demandes de Don</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
        body {
            font-family: 'Open Sans', serif;
            background-color: white;
            margin: 0;
            padding: 0;
            font-size:15px;
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
          
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #8B0000;
            color: white;
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
            width: 90px; /* Ajuste la taille du logo */
           
            /* Ajoute une marge en bas du logo */
        }
        
        .logo {
    text-align: center; /* Centrer horizontalement le contenu du div */
    margin-bottom: 20px; /* Ajouter une marge en bas du logo */
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
        }
    </style>

<body>
<a href="{{ route('groupesanguin.index') }}" class="btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
    <div class="logo">
        <img src="images/5.jpg" alt="Logo">
    </div>
    <h2>Répertoire_des_Groupes_Sanguins</h2>
    <a href="{{ route('ajout.groupesanguin') }}" class="btn ">Ajouter</a>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <table border="0">
        <thead>
            <tr>
                
                <th>Type</th>
                <th>Facteur_Rhesus</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groupesanguin as $groupesanguins)
                <tr>
                    <td>{{ $groupesanguins->type }}</td>
                    <td>{{ $groupesanguins->facteurrhesus }}</td>
                    <td>
                        <a href="{{ route('edit.groupesanguin', $groupesanguins->id) }}">Modifier</a>
                        <a href="{{ route('supprimer.groupesanguin', $groupesanguins->id) }}">Supprimer</a>
                    </td>
                </tr>
            @endforeach
    </table>
   

</body>
</html>
