<?php
include('conn.php');
include('movies.php');
include('series.php');
$cnx=new Connection();
$cnx->selectDatabase("datauser");
$id=$_GET['iduser'];

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
            <p class="hero-subtitle"> </p>
            <?php echo"      <h1 class='h1 hero-title'>
            <strong style='color: rgb(230, 230, 38);'>Result for</strong>,</h1> 
            <h1 class='h1 hero-title'>$_GET[search]  <i class='fas fa-arrow-alt-circle-down' style='font-size:36px'></i></h1>
          </div>
        </div> ";?>

      <!-- <h3 class="moviest" id="movies">MOVIES </h3> -->
      <div  class="movies-container">
     <?php  
     $movie=Movie::selectMovieByName('movies',$cnx->conn,$_GET['search']);
    if(isset($movie)){
        echo  '<a href="">
        <div class="movie-card">
          <div class="movie-image " id='.$movie['id'].'></div>
          
          <a href="" class="movie-buton"><i class="fa fa-play"></i></a>
           <a href="favoritem.php?idu=' . $id . '&ids=' . $movie['id'] . '" class="favorite-buton"><i class="fas fa-star"></i></a>
          <h4>'.$movie['titre'].'</h4>
        </div></a>';
    }
          ?>   
      </div>  
      
    <!-- <h3 id="series">SERIES</h3> -->
    <div    class="movies-container">   
    <?php  
     $serie=Serie::selectSerieByName('series',$cnx->conn,$_GET['search']);
    if(isset($serie)){
     echo  '<a href="">
        <div class="movie-card">
          <div class="movie-image " id='.$serie['id'].'></div>
          
          <a href="" class="movie-buton"><i class="fa fa-play"></i></a>
        <a href="favorites.php?idu=' . $id . '&ids=' . $serie['id'] . '" class="favorite-buton"><i class="fas fa-star"></i></a>
          <h4>'.$serie['titre'].'</h4>
        </div></a>';
     }
          ?>   
      </div> 

  </body>

</html>
