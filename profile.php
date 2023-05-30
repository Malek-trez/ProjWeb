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
        <link rel="stylesheet" href="bootstrap/css/all.min.css" />
        <link rel="stylesheet" href="styles.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    </head>

<body>
  <nav class="navbar navbar-expand-lg sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand ms-md-5" href="#">
          <img src="img/logo.png" alt="" height="90cm" width="200cm" />
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
                <div><a class="btn rounded-pill main-btn" href="profile.php"><?php echo $_SESSION['user']; ?></a></div>
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



<div class="container padding-bottom-3x mb-2">
    <div class="row">
        <div class="col-lg-4">
            <aside class="user-info-wrapper">
                <div class="user-cover" style="background-image: url(https://img.freepik.com/vecteurs-premium/abstrait-fond-couleur-rouge-tout-simplement-lisse_87543-97.jpg);">
                    <div class="info-label" data-toggle="tooltip" title="" data-original-title="Information"><i class="Information"></i>Information</div>
                </div>
                <div class="user-info">
                    <div class="d-flex justify-content-center" class="user-avatar">
                        <a class="edit-avatar" href="#"></a><img  class="img-fluid" src="img\profile.webp" alt="User" width="150cm" height="150cm"></div>
                   
                </div>
            </aside>
            <nav class="list-group">
                <a class="list-group-item with-badge" href="#"><i class=" fa fa-th"></i>Orders<span class="badge badge-primary badge-pill"></span></a>
                <button type="button" class="list-group-item list-group-item-action active" aria-current="true" onclick="showUserInfo()"><i class="fa fa-user"></i>Informations personnelles</button>
                <button type="button" class="list-group-item list-group-item-action" onclick="showBought()"><i class="fa fa-tag"></i>Voitures achetées<span class="badge badge-primary badge-pill"></span></button>
                <button type="button" class="list-group-item list-group-item-action" onclick="showRented()"><i class="fa fa-tag"></i>Voitures louées<span class="badge badge-primary badge-pill"></span></button>
            </nav>
        </div>
        <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <!-- Wishlist Table-->
            <div class="table-responsive wishlist-table margin-bottom-none">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Solde</th>
                            <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#">=*****</a></th>
                        </tr>
                    </thead>
               
                </table>
            </div>
            <hr class="mb-4">
          
        </div>
    </div>
</div>



<script>
        function showUserInfo() {
            // Replace the content of the right section with user information
            var rightSection = document.querySelector('.right-section');
            rightSection.innerHTML = `
      <h2>User Information</h2>
      <p>Here is the user information...</p>
    `;
        }

        function showBought() {
            // Replace the content of the right section with bought information
            var rightSection = document.querySelector('.right-section');
            rightSection.innerHTML = `
      <h2>Bought</h2>
      <p>Here are the bought details...</p>
    `;
        }

        function showRented() {
            // Replace the content of the right section with rented information
            var rightSection = document.querySelector('.right-section');
            rightSection.innerHTML = `
      <h2>Rented</h2>
      <p>Here are the rented details...</p>
    `;
        }

        showUserInfo();
    </script>

</body>
