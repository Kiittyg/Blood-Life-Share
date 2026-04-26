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
    <title>Stock</title>

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
        .form-label {
            font-weight: bold;
            color: #8B0000;
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
            width: 100px; /* Ajuste la taille du logo */
           
            /* Ajoute une marge en bas du logo */
        }
        .logo {
    text-align: center; /* Centrer horizontalement le contenu du div */
    margin-bottom: 20px; /* Ajouter une marge en bas du logo */
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
        .btn-back svg {
            width: 24px;
            height: 24px;
            fill: currentColor;
            margin-right: 5px;
        }
</style>
</head>
<a href="{{ route('stock.index') }}" class="btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
<body>
    <div class="container">
    <div class="logo">
            <img src="{{ asset('images/28.jpg') }}" alt="Logo">
        </div>
       
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('update.stock', $stock) }}" method="POST">
            @csrf
            <div class="mb-3">
            <label for="totalstock" class="form-label">Total Stock</label>
            <input type="text" name="totalstock" id="" class="form-control" value="{{ $stock->totalstock}}">
            <label for="responsablestock" class="form-label">Responsable Stock</label>
            <input type="text" name="responsablestock" id="" class="form-control" value="{{ $stock->responsablestock}}">
            <label for="misajour" class="form-label">Mis à Jour</label>
            <input type="date" name="misajour" id="" class="form-control" value="{{ $stock->misajour}}">
            <label for="niveaualerte" class="form-label">Niveau d'Alerte</label>
            <input type="text" name="niveaualerte" id="" class="form-control" value="{{ $stock->niveaualerte}}">
            <label for="centre_id" class="form-label">Centre De Transfusion</label>
            <select name="centre_id" class="form-control">
        @foreach($centre as $centres)
        <option value="{{ $centres->id }}" {{ $centres->id == $stock->centre_id ? 'selected' : '' }}>
            {{ $centres->nom }}
        </option>
     @endforeach
</select>

            <button class="btn btn-primary mt-3">Mettre à jour</button>
            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
