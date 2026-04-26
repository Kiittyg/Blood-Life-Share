<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Notifications</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
        }
        .btn-back {
            display: flex;
            align-items: center;
            padding: 10px;
            margin: 20px;
            text-decoration: none;
            color: #800000;
            font-weight: bold;
        }
        .btn-back svg {
            margin-right: 8px;
        }
        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #343a40;
            text-align: center;
        }
        .list-group-item {
            border: none;
            border-bottom: 1px solid #e9ecef;
            padding: 15px 20px;
        }
        .list-group-item:last-child {
            border-bottom: none;
        }
        .text-muted {
            font-size: 12px;
        }
        a {
            color: #800000;
        }
    </style>
</head>
<body>
    <a href="{{ route('home') }}" class="btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Retour
    </a>
    <div class="container mt-4">
        <h1>Notifications</h1>
        <ul class="list-group">
            @forelse ($notifications as $notification)
                <li class="list-group-item">
                    {!! $notification->contenu !!}
                    <small class="text-muted d-block mt-1">
                        {{ $notification->datenotif }} à {{ $notification->heurenotif }}
                    </small>
                </li>
            @empty
                <li class="list-group-item">Aucune notification</li>
            @endforelse
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
