

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white; 
            font-family: 'Open Sans', sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }

        .container {
            max-width: 400px; 
            padding: 20px; 
            background-color: white; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            color: black; 
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

        .btn-login {
            background-color: #8B0000; 
            color: white; 
            border: none; 
            width: 100%; 
            margin-top: 20px; 
            padding: 10px; 
            font-size: 18px; 
            font-weight: bold; 
            cursor: pointer; 
        }

        .password-wrapper {
            position: relative; 
        }

        .password-wrapper .toggle-password {
            position: absolute; 
            right: 10px; 
            top: 50%; 
            transform: translateY(-50%); 
            cursor: pointer; 
        }
        input[type="text"] {
    background-color: 	#F6F7EE;
}
    </style>
</head>
<body>

    <div class="container">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('login.submit') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="mb-3 password-wrapper">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="motdepasse" name="motdepasse" required autocomplete="new-password">
                <i class="toggle-password bi bi-eye" id="togglePassword"></i>
            </div>
            <button type="submit" class="btn btn-login">Se connecter</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#togglePassword').on('mousedown', function(event) {
                event.preventDefault();
                event.stopPropagation();

                const passwordField = $('#motdepasse');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                $(this).toggleClass('bi-eye bi-eye-slash');
            });
        });
    </script>
</body>
</html>
