<?php
session_start();
include('conn.php');
include('movies.php');
include('favmovie.php');
include('series.php');
include('favseries.php');

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
  <link rel="stylesheet" href="cssfile1.css">

</head>

    <body>
    <div class="top-container heroim" style="background-image: url('hero-bg.jpg')">
      <img src="logo.svg" alt="logo" class="logo">
    <div class="home">
      <div class="home1">
      <?php echo "<a href='page.php?iduser=$id'>HOME</a> "?>
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
            <strong style="color: rgb(230, 230, 38);">Welcome to your profile</strong>,</h1> 
            <h1 class="h1 hero-title">Your favorite shows <br> will appear here.</h1>
          </div>
        </div>

      <h3 class="moviest" id="movies">MOVIES </h3>
      <div  class="movies-container">
      <?php
            $movies = Movie::selectMovies('movies', $cnx->conn);
            $favmovies = Favmovie::selectfavMovies('favmovies', $cnx->conn, $id);

            if (is_array($favmovies) && count($favmovies) > 0) {
                foreach ($favmovies as $row) {
                    $movieId = $row['idm'];

                    $matchingMovie = array_filter($movies, function ($movie) use ($movieId) {
                        return $movie['id'] == $movieId;
                    });

                    if (!empty($matchingMovie)) {
                        $matchingMovie = reset($matchingMovie);

                        echo '<a href="">
                            <div class="movie-card">
                                <div class="movie-image" id="' . $row['idm'] . '"></div>
                                <a href="https://egybest.media/movies/watch/مشاهدة-فيلم-assassins-creed-2016-مترجم" class="movie-buton"><i class="fa fa-play"></i></a>
                                <a href="favoritemp.php?idu=' . $id . '&idm=' . $movieId . '" class="favorite-buton"><i class="fas fa-star"></i></a>
                                <h4>' . $matchingMovie['titre'] . '</h4>
                            </div></a>';
                    }
                }
            } else {
                echo "No favorite movies found.";
            }
            ?>

  
      </div>  
      
    <h3 id="series">SERIES</h3>
    <div    class="movies-container">   
    <?php  
     $series = Serie::selectSeries('series', $cnx->conn);
     $favseries = FavSeries::selectFavSeries('favseries', $cnx->conn, $id);

     if (is_array($favseries) && count($favseries) > 0) {
         foreach ($favseries as $row) {
             $serieId = $row['ids'];

             $Serie = array_filter($series, function ($serie) use ($serieId) {
                 return $serie['id'] == $serieId;
             });

             if (!empty($Serie)) {
                 $Serie = reset($Serie);

                 echo '<a href="">
                     <div class="movie-card">
                         <div class="movie-image" id="' . $row['ids'] . '"></div>
                         <a href="https://vf.enstream.plus/films/the-boys-in-the-band.html" class="movie-buton"><i class="fa fa-play"></i></a>
                         <a href="favoritesp.php?idu=' . $id . '&ids=' . $serieId . '" class="favorite-buton"><i class="fas fa-star"></i></a>
                         <h4>' . $Serie['titre'] . '</h4>
                     </div></a>';
             }
         }
     } else {
         echo "No favorite series found.";
     }
     ?>

            
      </div> 

  </body>

</html>
<?php } ?>