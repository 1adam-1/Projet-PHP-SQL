<?php
session_start();
include('conn.php');
include('movies.php');
include('series.php');
$cnx=new Connection();
$cnx->selectDatabase("datauser");

$id = isset($_GET['iduser']) ? $_GET['iduser'] : null;

if (!$id || !isset($_SESSION["name"])) {
    echo"please login first"; 
    }else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filmlane</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- fonts  -->
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cssfile2.css">  
</head>

    <body>
    <div class="top-container heroim">
      <img src="logo.svg" alt="logo" class="logo">
    <div class="home">
      <div class="home1">
      <a href="">HOME</a>
      <a href="#movies">MOVIES</a>
      <a href="#series">SERIES</a>
      <a href="logout.php" class="logout"> <i class="fa fa-sign-out"></i> Log Out</a>
    </div>
    <div class="search-container">
    <?php 
    echo "<form action='search.php'>
        <input type='hidden' name='iduser' value='" . urlencode($id) . "'>
        <input class='searchbar' type='text' placeholder='Search..' name='search'>
        <button class='button1' type='submit'><i class='fa fa-search'></i></button>
    </form>";
?>

    </div>
  </div>

    <div class="hero-container"></div>
          <div class="hero-content ">
            <p class="hero-subtitle">Filmlane</p>
            <h1 class="h1 hero-title">
              Unlimited <strong style="color: rgb(230, 230, 38);">Movie</strong>,</h1> 
            <h1 class="h1 hero-title">TVs Shows, & More.</h1>
            <?php
           echo" <a href='profilepage.php?iduser=$id'>
            <button class='bouton'><i class='fas fa-user-alt'></i> " . $_SESSION["name"] .
         " </button> </a>" ;?>
          </div>
        </div>
        <h3 id="series">SERIES</h3>
    <div    class="movies-container">   
    <?php  
     $series=Serie::selectSeries('series',$cnx->conn);
     foreach($series as $row){
     echo  '<a href="">
        <div class="movie-card">
          <div class="movie-image " id='.$row['id'].'></div>
          
          <a href="https://vf.enstream.plus/films/the-boys-in-the-band.html" class="movie-buton"><i class="fa fa-play"></i></a>
          <a href="favorites.php?idu=' . $id . '&ids=' . $row['id'] . '" class="favorite-buton"><i class="fas fa-star"></i></a>
          <h4>'.$row['titre'].'</h4>
        </div></a>';
     }
          ?>   
      </div>

      <h3 class="moviest" id="movies">MOVIES </h3>
      <div  class="movies-container">
     <?php  
     $movies=Movie::selectMovies('movies',$cnx->conn);
     foreach($movies as $row){
     echo  '<a href="">
        <div class="movie-card">
          <div class="movie-image " id='.$row['id'].'></div>
          
          <a href="https://egybest.media/movies/watch/مشاهدة-فيلم-assassins-creed-2016-مترجم" class="movie-buton"><i class="fa fa-play"></i></a>
          <a href="favoritem.php?idu=' . $id . '&idm=' . $row['id'] . '" class="favorite-buton"><i class="fas fa-star"></i></a>
          <h4>'.$row['titre'].'</h4>
        </div></a>';
     }
          ?>   
      </div>  
  
      <footer class="abtus">
        <img src="logo.svg" alt="">
        <div class="para">
        <p>Filmlane : le site de référence pour tous les fans de séries en streaming VOSTFR ! Notre plateforme vous offre un large choix de séries en version originale sous-titrée en français.
          Voirseries - Vous pourrez facilement parcourir les différentes catégories, trouver des recommandations personnalisées et accéder rapidement aux derniers épisodes disponibles.</p>
      </div>
      <div class="icons">
        <h4>Contact us :</h4>
      <a href="facebook.com" class="fa fa-facebook"></a>
      <a href="twitter.com" class="fa fa-twitter"></a>
      <a href="google.com" class="fa fa-google"></a>
      <a href="instagram.com" class="fa fa-instagram"></a>
      </div>
    </footer>
    

  </body>
  <script>const images = ['hero-bg.jpg','1.jpg', '2.jpg','4.jpg']; 
  let currentIndex = 0;
  
  function changeBackground() {
    document.querySelector('.heroim').style.backgroundImage = `url(${images[currentIndex]})`;
    currentIndex = (currentIndex + 1) % images.length;
  }
  setInterval(changeBackground, 4500);
  changeBackground();
  </script>
</html>
<?php } ?>