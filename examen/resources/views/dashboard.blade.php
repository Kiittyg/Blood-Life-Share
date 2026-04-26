<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Accueil - Bloodlifeshare</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #8B0000;
        }
        .navbar-brand {
            color: #ffffff;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
        }
        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }
        .hero-section {
            position: relative;
            text-align: center;
            color: white;
        }
        .hero-section img {
            width: 100%;
            height: 50vh;
            object-fit: cover;
            filter: brightness(50%);
        }
        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .hero-text h1 {
            font-size: 3rem;
            margin-bottom: 0;
        }
        .hero-text p {
            font-size: 1.5rem;
        }
        .content-section {
            padding: 3rem 1rem;
        }
        .content-section h2 {
            margin-bottom: 2rem;
            color: #343a40;
        }
        .footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 1rem 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Bloodlifeshare_Administration</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="donationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        DEMANDES DE DON
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="donationDropdown">
                        <li><a class="dropdown-item" href="{{ route('ajout.demandedon') }}">AJOUTER</a></li>
                        <li><a class="dropdown-item" href="{{ route('demandedon.index') }}">LISTER</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="bloodGroupDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        GROUPES SANGUINS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="bloodGroupDropdown">
                        <li><a class="dropdown-item" href="{{ route('ajout.groupesanguin') }}">AJOUTER</a></li>
                        <li><a class="dropdown-item" href="{{ route('groupesanguin.index') }}">LISTER</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="bloodGroupDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        STOCK
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="bloodGroupDropdown">
                        <li><a class="dropdown-item" href="{{ route('enregistrer.stock') }}">AJOUTER</a></li>
                        <li><a class="dropdown-item" href="{{ route('stock.index') }}">LISTER</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="bloodGroupDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        STOCK_GS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="bloodGroupDropdown">
                        <li><a class="dropdown-item" href="{{ route('ajout.stockgs') }}">AJOUTER</a></li>
                        <li><a class="dropdown-item" href="{{ route('stockgs.index') }}">LISTER</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="bloodGroupDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        RENDEZ-VOUS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="bloodGroupDropdown">
                        <li><a class="dropdown-item" href="{{ route('ajout.lignerv') }}">AJOUTER</a></li>
                        <li><a class="dropdown-item" href="{{ route('lignerv.index') }}">LISTER</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
    <img src="images/about/tube.jpg" alt="Hero Image">
    <div class="hero-text">
        <h1>Bienvenue à Bloodlifeshare</h1>
        <p>Sauvez des vies en faisant un don de sang</p>
    </div>
</div>

<!-- Content Section -->
<div class="container content-section">
    <h2>Pourquoi donner du sang ?</h2>
    <div class="row">
        <div class="col-md-4">
            <img src="images/about/ucad.jpeg" class="img-fluid mb-3" alt="Don de sang 1">
            <p>Le don de sang permet de sauver des vies en fournissant des produits sanguins essentiels aux patients dans le besoin.</p>
        </div>
        <div class="col-md-4">
            <img src="images/team/t.jpg" class="img-fluid mb-3" alt="Don de sang 2">
            <p>Chaque don de sang peut aider jusqu'à trois personnes et est essentiel pour les interventions chirurgicales et les urgences médicales.</p>
        </div>
        <div class="col-md-4">
            <img src="images/team/d.jpg" class="img-fluid mb-3" alt="Don de sang 3">
            <p>Le processus de don de sang est simple et sûr, et permet aux donneurs de jouer un rôle vital dans leur communauté.</p>
        </div>
    </div>
</div>

<!-- Footer -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
