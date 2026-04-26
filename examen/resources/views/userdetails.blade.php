<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page principale</title>
</head>
<body>
    <div id="user-details">
        <p>Connectez-vous pour voir les détails de l'utilisateur.</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var userDetails = document.getElementById('user-details');
            if (userDetails) {
                fetch('/user-details')
                    .then(response => response.json())
                    .then(data => {
                        if (data.userId && data.userType) {
                            userDetails.innerHTML = `
                                <p>ID de l'utilisateur : ${data.userId}</p>
                                <p>Type d'utilisateur : ${data.userType}</p>
                                <p>Utilisateur connecté : ${data.nom}</p>
                                <p>Email : ${data.email}</p>
                            `;
                        } else {
                            userDetails.innerHTML = `
                                <p>Informations sur l'utilisateur non disponibles.</p>
                            `;
                        }
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des détails de l\'utilisateur :', error);
                    });
            }
        });
    </script>
</body>
</html>
