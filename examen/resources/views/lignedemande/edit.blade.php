<!DOCTYPE html>
<html>
<head>
    <title>Modifier la demande de don</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
            font-size: 30px;
        }

        a {
            color: #8B0000;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
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
    <div class="container mt-5">
        <a href="{{ route('home') }}" class="btn-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
            Retour
        </a>
        <h2>Modifier la demande de don</h2>
        <form action="{{ route('update.lignedemande', $lignedemande->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="donneur_id">Donneur</label>
                <input type="text" class="form-control" id="donneur_id" name="donneur_id" value="{{ old('donneur_id', $lignedemande->donneur_id) }}" required>
            </div>
            <div class="form-group">
                <label for="nomdemandeur">Nom Demandeur</label>
                <input type="text" class="form-control" id="nomdemandeur" name="nomdemandeur" value="{{ old('nomdemandeur', $lignedemande->demandedon->nomdemandeur ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="statut">Statut</label>
                <input type="text" class="form-control" id="statut" name="statut" value="{{ old('statut', $lignedemande->demandedon->statut ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="lieu">Lieu</label>
                <input type="text" class="form-control" id="lieu" name="lieu" value="{{ old('lieu', $lignedemande->demandedon->lieu ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="nbdonneurs">Nombre Donneurs</label>
                <input type="number" class="form-control" id="nbdonneurs" name="nbdonneurs" value="{{ old('nbdonneurs', $lignedemande->demandedon->nbdonneurs ?? 0) }}" required>
            </div>
            <div class="form-group">
                <label for="groupesanguin_type">Groupe Sanguin (Type)</label>
                <input type="text" class="form-control" id="groupesanguin_type" name="groupesanguin_type" value="{{ old('groupesanguin_type', $lignedemande->demandedon->groupesanguin->type ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="groupesanguin_facteurrhesus">Groupe Sanguin (Facteur Rhésus)</label>
                <input type="text" class="form-control" id="groupesanguin_facteurrhesus" name="groupesanguin_facteurrhesus" value="{{ old('groupesanguin_facteurrhesus', $lignedemande->demandedon->groupesanguin->facteurrhesus ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
