<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <title>Demandedon</title>
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
            width: 90px; /* Ajuste la taille du logo */
           
            /* Ajoute une marge en bas du logo */
        }
        .logo {
    text-align: center; /* Centrer horizontalement le contenu du div */
    margin-bottom: 20px; /* Ajouter une marge en bas du logo */
}
    </style>
</head>
<a href="{{ route('demandedon.index') }}" class="btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
    </a>
<body>
    <h1 class="text-center text-success"style="text-decoration: underline;"></h1>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('update.demandedon', $demandedon) }}" method="POST">
            @csrf
            <div class="mb-3">
            <label for="nomdemandeur" class="form-label">Nom du Demandeur</label>
            <input type="text" name="nomdemandeur" id="" class="form-control" value="{{ $demandedon->nomdemandeur}}">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" name="lieu" id="" class="form-control" value="{{ $demandedon->lieu}}">
            <label for="statut" class="form-label">Statut :</label>
    <select id="statut" name="statut" class="form-control" value="{{ $demandedon->statut}}">
        <option value="{{ $demandedon->statut}}">urgent</option>
        <option value="{{ $demandedon->statut}}">pas urgent</option>
    </select>
    <label for="groupesanguin_id" class="form-label">Groupe Sanguin</label>
                <select name="groupesanguin_id" id="groupesanguin_id" class="form-select" required>
                    @foreach ($groupesanguin as $groupesanguins)
                        <option value="{{ $groupesanguins->id }}" {{ $groupesanguins->id }}>
                            {{ $groupesanguins->type }}   {{ $groupesanguins->facteurrhesus }}
                        </option>
                    @endforeach
                </select>
    <label for="nbdonneurs" class="form-label">Nombre de Donneurs</label>
            <input type="text" name="nbdonneurs" id="" class="form-control" value="{{ $demandedon->nbdonneurs}}">
            <button class="btn btn-primary mt-3">Enregistrer</button>
            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
