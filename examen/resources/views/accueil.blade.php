<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Document</title>
</head>
<style>
    /* public/css/styles.css */
    body {
    margin: 0;
    padding: 0;
    position: relative;
    background-image: url('assets/c.jpg');
    background-size: cover;
    color: #fff;
    height:2000px;
}
.menu {
            position:absolute;
            top: 5px;
            right: 15px;
        
            list-style: none;
            display: flex;
        }

        .menu li {
            margin-left: 10px;
        }

        .menu a {
            text-decoration: none;
            color:yellow;
            font-weight: bold;
            font-size: 15px;
        }
        

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    padding: 20px;
    z-promoteur: 1;
}

.overlay::before {
    content:"";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Centre l'image par rapport à son conteneur */
    width: 100%;
    height: 5000%;
    background-image: url('');
    background-size: contain; /* Ajustez la propriété background-size */
    background-position: center;
    opacity: 0.4;
    z-promoteur: -1;
}


h2{
    font-size:50px ;
    font-family: 'bangers', serif;
    color:white;
    font-weight: bold;
    text-decoration: underline; /* Souligner le texte */
    text-decoration-color: #ffcc00; /* Couleur du soulignement */
    letter-spacing: 2px; /* Espacement entre les lettres */
    margin-bottom: 20px; /* Marge en bas pour l'espace */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}
p{
    
}

</style>
<body>
<!--div class="overlay">
<h2> BATI*PLU'S
</h2>
<div class="overlay-container">
        <ul class="menu">
                       
                <li><a href="{{ route('register') }}">S'inscrire</a></li>
                <li><a href="{{ route('login') }}">Se connecter</a></li>
                
            </ul>
            </div>
            <div><p>BIENVENUE CHEZ NOUS</p></div>

            <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <p class="mb-5 lead">Explorez simplement le désir d'acquérir, et nous concrétiserons la construction de votre maison idéale à la hauteur de vos rêves.</p>
          </div>
        </div>
        <div> <h3 class="scissors text-center">"Découvrez des terrains disponibles dans toutes les régions du Sénégal avec notre sélection variée."</h3></div>
         

<div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            
          <div class="row hair-style">
          <div class="col-lg-4 col-md-4 col-sm-6 col-12" style="text-align:center" opacity=0.6>
              <img src="assets/t.png" alt="Image placeholder" height="250px" >
          </div>
        </div-->
        
      </div>
    </div>
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            
        </div>
        <div class="carousel-item">
            <a href="{{ route('enregistrer.groupesanguin') }}" class="place">
                <img src="" class="d-block w-100" alt="Image placeholder" height="300px">
            </a>
        </div>
        <div class="carousel-item">
            <a href="{{ route('enregistrer.groupesanguin') }}" class="place">
                <img src="assets/2.jpg" class="d-block w-100" alt="Image placeholder" height="300px">
            </a>
        </div>
        <div class="carousel-item">
            <a href="{{ route(''enregistrer.groupesanguin') }}" class="place">
                <img src="assets/2a.jpg" class="d-block w-100" alt="Image placeholder" height="300px">
        

  
</body>
</html>














