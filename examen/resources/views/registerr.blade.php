<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    
<link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: white;
        font-family: 'Open Sans', sans-serif;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        max-width: 900px; /* Augmentez la largeur pour faire de la place pour l'accordéon sur le côté */
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color: black;
        margin-top: 80px;
    }

    .logo {
        text-align: center;
        margin-bottom: 20px;
    }

    .logo img {
        width: 160px;
    }

    .welcome-text {
        text-align: center;
        margin-bottom: 30px;
        font-family: 'Open Sans', sans-serif;
    }

    .alert {
        margin-top: 20px;
    }

    .form-label {
        font-weight: bold;
        color: #8B0000;
    }

    .form-control {
        border: none;
        padding: 10px;
        border-radius: 5px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }

    .password-toggle .password-toggle-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .alert-danger {
        color: red;
    }

    .btn-inscrire {
        background-color: #8B0000;
        color: black;
        border: none;
        width: 100%;
        margin-top: 20px;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
    }

    input[type="text"] {
        background-color: #F6F7EE;
    }

    .marquee-container {
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #f2f2f2;
        padding: 10px 0;
        z-index: 9999;
        text-align: center;
    }

    .marquee-text {
        display: inline-block;
        white-space: nowrap;
        color: #8B0000;
        font-size: 2.5em;
        font-family: 'Arial', sans-serif;
        text-shadow: 2px 2px 4px #aaa;
        animation: marquee 10s linear infinite;
    }

    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .accordion {
        min-width: 300px; /* Largeur minimale pour l'accordéon */
    }
</style>
<body>
<div class="marquee-container">
    <h2 class="marquee-text">Bienvenue à BloodLifeShare</h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Accordéon sur le côté -->
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Comment créer un compte ?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Pour créer un compte, veuillez suivre les étapes suivantes :</p>
                            <ol>
                                <li>Sélectionnez le type d'utilisateur (Donneur ou Responsable) dans le menu déroulant.</li>
                                <li>Si vous êtes un Donneur, sélectionnez également votre groupe sanguin.</li>
                                <li>Remplissez vos informations personnelles, y compris le nom, prénom, date de naissance, sexe, ville, téléphone, email et login.</li>
                                <li>Pour un Responsable, veuillez également remplir les champs de localité, fonction, et boîte postale.</li>
                                <li>Assurez-vous que tous les champs obligatoires sont remplis avant de soumettre le formulaire.</li>
                                <li>Cliquez sur le bouton "S'inscrire" pour compléter l'inscription.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
        <div class="logo">
            <img src="images/Capture.png" alt="Logo" > <!-- Remplacez par votre chemin de logo -->
        </div>

        <div class="welcome-text">
            <h2></h2>
            <div class="logo">
            <img src="images/sang.avif" alt="logo" > 
</div>
            <p></p>

        </div>
        <div class="container mt-3">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
</div>
    @endif
        <form action="{{ route('ajout.user') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="user_type" class="form-label">Type d'utilisateur</label>
                <select class="form-control" id="user_type" name="user_type" required>
                    <option value="donneur">Donneur</option>
                    <option value="responsable">Responsable</option>
                </select>
            </div>
            <div class="mb-3" id="groupesanguin_field">
    <label for="groupesanguin_id" class="form-label">Groupe Sanguin</label>
    <select class="form-control" id="groupesanguin_id" name="groupesanguin_id" required>
        <option value="">Sélectionner un groupe sanguin</option>
        <option value="">Aucune connaissance</option>
        @foreach($groupesanguin as $groupesanguin)
            <option value="{{ $groupesanguin->id }}">{{ $groupesanguin->type }} {{ $groupesanguin->facteurrhesus}}</option>
        @endforeach
    </select>
</div>
</div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
                @error('nom')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
                @error('prenom')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            </div>
            <div class="mb-3">
                <label for="naissance" class="form-label">Date de Naissance</label>
                <input type="date" class="form-control" id="naissance" name="naissance" required>
            </div>
            <div class="mb-3">
    <label for="sexe" class="form-label">Sexe</label>
    <select class="form-control" id="sexe" name="sexe" required>
        <option value="masculin">Masculin</option>
        <option value="feminin">Féminin</option>
    </select>
</div>

            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" required>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login"  required>
                @error('login')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            </div>
            <!--div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="motdepasse" name="motdepasse" required autocomplete="new-password">
                @error('motdepasse')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            </div--->
            <div class="password-toggle">
    <label for="motdepasse" class="form-label">Mot de passe</label>
    <div class="input-group">
        <input type="password" class="form-control" id="motdepasse" name="motdepasse" required autocomplete="new-password">
        <span class="password-toggle-icon" id="togglePassword">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 4.6a9 9 0 0 1 0 14.8"></path>
                <path d="M4.6 19.4a9 9 0 0 1 0-14.8"></path>
                <path d="M1 1l22 22"></path>
            </svg>
        </span>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#motdepasse');

        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            togglePassword.classList.toggle('show-password');
        });
    });
</script>

            <div class="mb-3" id="localite_field">
                <label for="localite_id" class="form-label">Localité</label>
                <select class="form-control" id="localite_id" name="localite_id" required>
                    <option value="">Sélectionner une localité</option>
                    @foreach($localite as $localite)
                        <option value="{{ $localite->id }}">{{ $localite->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 d-none" id="boite_postale_field">
                <label for="boite_postale" class="form-label">Boite Postale</label>
                <input type="text" class="form-control" id="boite_postale" name="boite_postale">
            </div>
            
<div class="mb-3 d-none" id="fonction_field">
    <label for="fonction" class="form-label">Fonction</label>
    <input type="text" class="form-control" id="fonction" name="fonction">
</div>

<button type="submit" class="btn btn-inscrire">S'inscrire</button>
<div class="container mt-3">
    <p>Vous avez déjà un compte ? <a href="{{ route('loginn') }}">Se connecter</a></p>
</div>

            <div>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user_type').change(function() {
                if ($(this).val() == 'responsable') {
                    $('#localite_field').addClass('d-none'); // Masquer le champ localite_id
                    $('#fonction_field').removeClass('d-none'); // Afficher le champ fonction
                    $('#localite_id').removeAttr('required'); // Enlever l'obligation du champ localite_id
                    $('#fonction').prop('required', true); // Rendre le champ fonction obligatoire
                    $('#boite_postale_field').removeClass('d-none'); // Afficher le champ boite_postale
                    $('#boite_postale').prop('required', true); // Rendre le champ boite_postale obligatoire
                    $('#groupesanguin_field').addClass('d-none'); // Masquer le champ groupesanguin_id
                    $('#groupesanguin_id').removeAttr('required'); // Enlever l'obligation du champ groupesanguin_id
                } else {
                    $('#localite_field').removeClass('d-none'); // Afficher le champ localite_id
                    $('#fonction_field').addClass('d-none'); // Masquer le champ fonction
                    $('#fonction').removeAttr('required'); // Enlever l'obligation du champ fonction
                    $('#localite_id').prop('required', true); // Rendre le champ localite_id obligatoire
                    $('#boite_postale_field').addClass('d-none'); // Masquer le champ boite_postale
                    $('#boite_postale').removeAttr('required'); // Enlever l'obligation du champ boite_postale
                    $('#groupesanguin_field').removeClass('d-none'); // Afficher le champ groupesanguin_id
                    $('#groupesanguin_id').prop('required', true); // Rendre le champ groupesanguin_id obligatoire
                }
            });
        });
    </script>
</body>





