<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations de l'Utilisateur</title>
    <!-- Styles intégrés -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #8B0000; /* Couleur rouge */
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #ffffff; /* Texte blanc */
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 30px;
            font-size: 24px;
        }

        p {
            font-size: 16px;
            color: #ffffff;
            line-height: 1.6;
            margin: 12px 0;
        }

        p strong {
            color: #f8f9fa; /* Texte blanc plus clair */
        }

        a.btn-back {
            display: inline-block;
            background-color: #dc3545; /* Couleur rouge */
            color: #ffffff; /* Texte blanc */
            border: none;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        a.btn-back:hover {
            background-color: #c82333; /* Rouge foncé pour le survol */
            transform: scale(1.02);
        }

        .logo img {
            width: 120px; /* Ajuster la taille du logo */
        }

        .logo {
            text-align: center; /* Centrer horizontalement le contenu du div */
            margin-bottom: 30px; /* Ajouter une marge en bas du logo */
        }

        /* Style pour l'icône SVG */
        .btn-icon {
            display: inline-block;
            background-color: #dc3545; /* Couleur rouge */
            color: #ffffff; /* Texte blanc */
            border: none;
            padding: 12px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            margin-bottom: 20px;
        }

        .btn-icon svg {
            fill: #ffffff; /* Couleur de l'icône SVG */
        }

        .btn-icon:hover {
            background-color: #c82333; /* Rouge foncé pour le survol */
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="{{ route('home') }}" class="btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
        </a>
        <div class="logo">
            <img src="images/user.png" alt="Logo">
        </div>
        @if ($user)
            <h1>Informations de l'Utilisateur</h1>
            <p><strong>Nom :</strong> {{ $user->nom }}</p>
            <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Code Unique :</strong> {{ $user->code_unique }}</p>
            <p><strong>Type d'Utilisateur :</strong> {{ $user_type }}</p>
            <!-- Ajoutez d'autres informations selon les besoins -->
        @else
            <p>Aucun utilisateur connecté.</p>
        @endif
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn-back">Déconnexion</button>
        </form>
    </div>
</body>
</html>
