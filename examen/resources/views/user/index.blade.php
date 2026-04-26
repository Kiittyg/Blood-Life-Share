<!DOCTYPE html>
<html>
<head>
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn-edit, .btn-delete {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Liste des Utilisateurs</h1>

        <h2>Donneurs</h2>
        @if ($donneur->isEmpty())
            <p>Aucun donneur n'a été trouvé.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Type de Groupe Sanguin</th>
                        <th>Facteur Rhesus</th>
                        <th>Localité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donneur as $donneurs)
                        <tr>
                            <td>{{ $donneurs->id }}</td>
                            <td>{{ $donneurs->nom }}</td>
                            <td>{{ $donneurs->prenom }}</td>
                            <td>{{ $donneurs->email }}</td>
                            <td>
                                @if ($donneurs->groupesanguin)
                                    {{ $donneurs->groupesanguin->type }}
                                @else
                                    Non spécifié
                                @endif
                            </td>
                            <td>
                                @if ($donneurs->groupesanguin)
                                    {{ $donneurs->groupesanguin->facteurrhesus }}
                                @else
                                    Non spécifié
                                @endif
                            </td>
                            <td>{{ $donneurs->localite->nom ?? 'Non spécifié' }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <h2 class="mt-5">Responsables</h2>
        @if ($responsable->isEmpty())
            <p>Aucun responsable n'a été trouvé.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Fonction</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($responsable as $responsables)
                        <tr>
                            <td>{{ $responsables->id }}</td>
                            <td>{{ $responsables->nom }}</td>
                            <td>{{ $responsables->prenom }}</td>
                            <td>{{ $responsables->email }}</td>
                            <td>{{ $responsables->fonction }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
