

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, width=device-width">
        <!-- http://getbootstrap.com/docs/5.1/ -->
        <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet">
        <script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"></script>

        <!-- https://favicon.io/emoji-favicons/money-bag/ -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EASYDRIVE</title>
    <link rel="stylesheet" href="bootstrap\css\all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
      


      <title>index</title>
    </head>

    <body>
    <nav class="navbar navbar-expand-lg sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand ms-md-5" href="#">
          <img src="img\logo.png" alt="" height="90cm" width="200cm" />
        </a>
        <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#main"
                aria-controls="main"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="main">
          <ul class="navbar-nav  mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3" href="#Services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3" href="#about">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3" href="#Contact">Contact</a>
            </li>
          </ul>
          <div class="search ps-3 pe-3 d-none d-lg-block">
            <i class="fa-solid "></i>
          </div>
            <?php
            session_start();
            if(isset($_SESSION['user']))
            {
            ?>
                <div><a class="btn rounded-pill main-btn" href="Profile.html"><?php echo $_SESSION['user']; ?></a></div>
                <div><a class="btn rounded-pill main-btn" href="logout.php">Logout</a></div>
            <?php
            }
            else {
            ?>

                <div class=" rounded-pill main-btn " >
                    <a class="btn  main-btn" href="login.html">Login</a>
                    <a>/</a>
                    <a class="btn  main-btn" href="register.html">Register</a>
                </div>
            <?php
            }
            ?>
        </div>
      </div>
    </nav>

    <div class="container-fluid banner">
      <div class="row">
        <div class="col-md-12 ">
          <div style="width: 100%; margin: auto;" class="navbar navbar-md">

              <ul style="width: 50%; margin: auto;" class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="cars\Aston\aston.html">Aston</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="cars\bugatti\bugatti.html">Bugatti</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="cars\koenigsegg\koenigsegg.html">Koenigsegg</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="cars\lamborghinni\lamborghinni.html">Lamborghinni</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="cars\Porche\porche.html">Porche</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="cars\rollsroyce\rollsroyce.html">Rollsroyce</a>
                  </li>
              </ul>
          </div>
        </div>
        <div class="col-md-8 offset-md-2 info">
          <h1 class="text-center">TRUST EASYDRIVE</h1>
          <p class="text-center">
            Votre Partenaire De Route
          </p>
          <a class="btn rounded-pill main-btn" href="register.html">Get Started</a>
        </div>
      </div>
    </div>

    <div class="features text-center pt-5 pb-5" id="Services">
      <div class="container">
        <div class="main-title mt-5 mb-5 position-relative">
          <img class="mb-4" src="img\logo.png" alt="" width="100cm" height="100cm" />
          <h2>Trouvez de Super offres</h2>
          <p class="text-black-50 text-uppercase">Réservez et Achetez maintenant à des tarifs bas et économisez!</p>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="feat">
              <div class="icon-holder position-relative">
                <i class="fa-solid fa-1 position-absolute bottom-0 number"></i>

                <i class="fa-solid fa-car fa-4x position-absolute bottom-0 icon"></i>
              </div>
              <h4 class="mb-3 mt-3 text-uppercase">Réservation flexible</h4>
              <p class="text-black-50 lh-lg">
                L'agence EASYDRIVE vous propose un service de réservation,de vente de voiture en ligne simple et pratique disponible 7j/7.
                Faites votre demande de location et d'achat puis sélectionnez l’offre qui vous convient le mieux.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="feat">
              <div class="icon-holder position-relative">
                <i class="fa-solid fa-2 position-absolute bottom-0 number"></i>
                <i class="fa-solid fa-xmark fa-4x position-absolute bottom-0 icon"></i>
              </div>
              <h4 class="mb-3 mt-3 text-uppercase">Annulation gratuite</h4>
              <p class="text-black-50 lh-lg">
                Si vos plans changent, vous pouvez annuler ou modifier gratuitement jusqu'à 48 heures avant le début de votre location ou
                achat.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="feat">
              <div class="icon-holder position-relative">
                <i class="fa-solid fa-3 position-absolute bottom-0 number"></i>
                <i class="fa-solid fa-thumbs-up fa-4x position-absolute bottom-0 icon"></i>
              </div>
              <h4 class="mb-3 mt-3 text-uppercase">Qualité et Savoir-faire</h4>
              <p class="text-black-50 lh-lg">
                EASYDRIVE vous assure une transparence totale pour trouver une voiture de luxe et de sport adaptée à votre besoin et aux meilleurs prix.
                Nous assurons à notre chère clientèle des voitures de locations et de vente récentes & propres.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="our-work text-center pt-5 pb-5">
  <div class="container">
    <div class="main-title mt-5 mb-5 position-relative">
      <img class="mb-4" width="100cm" height="100cm" src="img\logo.png" alt="" />
      <h2>Marques disponibles chez nous</h2>
      <p class="text-black-50 text-uppercase">Choisissez votre marque de voiture et découvrez toutes les actualités</p>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="box mb-3 bg-white" data-work="aston">
          <img class="img-fluid img-size" src="img\aston.jpg" alt="" />
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="box mb-3 bg-white" data-work="Bugatti">
          <img class="img-fluid img-size" src="img\Bugatti.png" alt="" />
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="box mb-3 bg-white" data-work="koenigsegg">
          <img class="img-fluid img-size" src="img\koenigsegg.png" alt="" />
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="box mb-3 bg-white" data-work="lamborghini">
          <img class="img-fluid img-size" src="img\lamborghini.jpg" alt="" />
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="box mb-3 bg-white" data-work="Porsche">
          <img class="img-fluid img-size" src="img\porsche.jpeg" alt="" />
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="box mb-3 bg-white" data-work="Rolls-Royce">
          <img class="img-fluid img-size" src="img\rolls.png" alt="" />
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center mt-5">
      <a class="btn rounded-pill main-btn text-uppercase" href="#">+ PLUS</a>
    </div>
  </div>
</div>



    <div class="stuff pt-5" id="about">
      <div class="container">
        <div class="main-title text-center mt-5 mb-5 position-relative">
          <img class="mb-4" src="img\logo.png" width="100cm" height="100cm" alt="" />
          <h2>A Propos EASYDRIVE</h2>
          <p class="text-black-50 text-uppercase">Votre partenaire de route</p>
        </div>
        <p class="description text-center mb-5 text-black-50 m-auto">
          La preimière Agence vente et location de voiture de luxe et sport en Tunisie, EASYDRIVE vous offre ses services de location et de vente avec une sélection de véhicules
          de luxe à des meilleurs prix .Vous êtes à la recherche d’une offre spéciale de location et d'achat de voiture comme une nouvelle experience? Visitez EASYDRIVE
          et profitez de nos offres exceptionnelles: Notre agence vous assure une vaste gamme de véhicules qui s’adaptent à tous vos besoins.
        </p>
        <div class="row align-items-center">
          <div class="col-lg-4 mb-4 text-center text-md-start">
            <div class="text">
              <h4>Bienvenue chez EASYDRIVE</h4>
              <p class="text-black-50 fs-6">
                EASYDRIVE, dont le siège social se situe au centre urbain nord, est implantée sur le marché de la Tunisie dans le domaine de la vente et de
                la location automobile luxe et sport comme une premiere avec des prix compétitifs depuis 2021. Ainsi, notre société s’est donnée comme priorité la qualité
                de service et la satisfaction de ses clients en employant le savoir-faire développé au cours de ses 2 années d’expérience pour offrir
                un service de qualité qui s’adapte aux besoins des clients, leurs exigences et surtout leurs contraintes budgétaires.
              </p>
              <p class="text-black-50 fs-6">
                EASYDRIVE fait partie des meilleures agences sur le marché en Tunisie pas cher, nous sommes reconnus par
                la qualité de notre gamme de véhicules et de nos prix assez attractifs et de notre flotte de voitures qui est très large.
              </p>

            </div>
          </div>
          <div class="col-lg-8">
            <div class="image">
              <img class="img-fluid" src="img\work.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="team text-center pb-5 pt-5" id="Contact">
      <div class="container pb-5 pt-5">
        <h2 class="fw-bold">Rencontrer notre équipe</h2>
        <p class="text-black-50 mb-5">
          Si vous souhaitez savoir plus sur notre agence, n’hésitez pas à nous contacter pour bénéficier de nos offres et
          et de l'avis de nos éxperts:
        </p>
        <div class="row">
          <div style="width: 16.7%; margin: auto;" class="col-md-6 col-lg-3">
            <div class="box bg-white">
              <img class="img-fluid" src="" alt="" />
              <h4 class="p-3 text-light" style="border-radius: 10px;-webkit-border-radius: 10px;">Malek Gharbi</h4>
              <blockquote class="text-black-50 p-3">
                +216 01010101
                mohamedmalek.gharbi <br>
                @insat.ucar.tn
              </blockquote>
            </div>
          </div>
          <div style="width: 16.7%; margin: auto;" class="col-md-6 col-lg-3">
            <div class="box bg-white">
              <img class="img-fluid" src="" alt="" />
              <h4 class="p-3 text-light" style="border-radius: 10px;-webkit-border-radius: 10px;">Houaida Mangour</h4>
              <blockquote class="text-black-50 p-3">
                +216 02020202
                Houaida.Mangour@ <br>
                insat.ucar.tn
              </blockquote>
            </div>
          </div>
          <div style="width: 16.7%; margin: auto;" class="col-md-6 col-lg-3">
            <div  class="box bg-white">
              <img class="img-fluid" src="" alt="" />
              <h4 class="p-3 text-light" style="border-radius: 10px;-webkit-border-radius: 10px;
                    ">Anas Bader</h4>
              <blockquote class="text-black-50 p-3">
                +216 03030303
                anas.bader@insat.ucar.tn
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="techs pt-5 pb-5 text-center">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
        <img class="img-fluid" src="img/buy.jpg" alt="" />
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
        <img class="img-fluid" height="100cm" width="100cm" src="img/gif.jpg" alt="" />
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
        <img class="img-fluid" src="img/rent.jpg" alt="" />
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
        <img class="img-fluid" src="img/buy.jpg" alt="" />
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
        <img class="img-fluid" height="100cm" width="100cm" src="img/gif.jpg" alt="" />
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
        <img class="img-fluid" src="img/rent.jpg" alt="" />
      </div>
    </div>
  </div>
</div>



    <div class="footer pt-5 pb-5 text-white-50 text-center text-md-start">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="info mb-5">
              <img src="img\logo.png" alt="" class="mb-4" />
              <p class="mb-5">
                EASYDRIVE est une agence de vente et location de voiture en Tunisie,
                disposant d’une large gamme de véhicules, avec boîte manuelle ou automatique à des prix convenables.
              </p>
              <div class="copyright">
                <i class="fa-solid fa-location-dot"></i>
                centre urbain nord
                <div>&copy; 2021 - <span>EASYDRIVE</span></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-2">
            <div class="links">
              <h5 class="text-light">Links</h5>
              <ul class="list-unstyled lh-lg">
               <a href="#" ><li class="text-secondary">Accueil</li></a> 
               <a href="#Services" ><li class="text-secondary">Services</li></a>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-2">
            <div class="links">
              <h5  class="text-light">About Us</h5>
              <ul class="list-unstyled lh-lg">
                <a class="no-link-highlight" href="login.html"><li class="text-secondary">login</li></a>
                <a href="register.html"><li class="text-secondary">Register</li></a>
                <a href="#about"><li class="text-secondary">A propos</li></a>
                <a  href="#Contact"><li class="text-secondary">Contacter nous</li></a>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="contact">
              <h5 class="text-light">Contact Us</h5>
              <p>Par Email :</p>
              <a class="btn rounded-pill main-btn w-100" href="https://mail.google.com/mail/?view=cm&to=EASYDRIVE@gmail.com" target="_blank" >
                EASYDRIVE@gmail.com</a>
              <p class="lh-lg mt-3 mb-5">OU Contactez-nous par téléphone. Nous attendons votre appel ou votre message</p>
              <p>Tel/Fax : 40 00 00 00</p>
              <p>
                GSM : 20 000 000</p>
              <ul class="d-flex mt-5 list-unstyled gap-3">
                <li>
                  <a class="d-block text-light" href="#"
                  ><i class="fa-brands fa-facebook fa-lg facebook rounded-circle p-2"></i
                  ></a>
                </li>
                <li>
                  <a class="d-block text-light" href="#"
                  ><i class="fa-brands fa-twitter fa-lg twitter rounded-circle p-2"></i
                  ></a>
                </li>
                <li>
                  <a class="d-block text-light" href="#"
                  ><i class="fa-brands fa-linkedin fa-lg linkedin rounded-circle p-2"></i
                  ></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    </body>
</html>