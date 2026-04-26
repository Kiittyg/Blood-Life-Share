<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
            font-size: 14px;
        }
        .btn-primary {
            background-color: #800000;
            border-color: #800000;
        }
        .btn-primary:hover {
            background-color: #a00000;
            border-color: #a00000;
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
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16" >
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
<form action="{{ route('ajout.lignedon') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="don_id">Don</label>
        <select id="don_id" name="don_id" class="form-control" required>
            @foreach ($don as $d)
                <option value="{{ $d->id }}" {{ $d->id == $donId ? 'selected' : '' }}>
                    {{ $d->details }} (Centre: {{ $d->centrehospitalier->nom }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="donneur_id">Donneur</label>
        <select id="donneur_id" name="donneur_id" class="form-control" required>
            @foreach ($donneur as $d)
                <option value="{{ $d->id }}">{{ $d->code_unique }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="nbfois">Nombre de Fois</label>
        <input type="number" id="nbfois" name="nbfois" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="quantite">Quantité</label>
        <input type="text" id="quantite" name="quantite" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="qualite">Qualité</label>
        <input type="text" id="qualite" name="qualite" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Créer Ligne de Don</button>
</form>

</body>
</html>
