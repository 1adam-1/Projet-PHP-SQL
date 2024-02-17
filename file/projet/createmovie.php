<?php

$idValue = "";
$titreValue = "";

$errorMesage = "";
$successMesage = "";

if (isset($_POST["submit"])) {
    $idValue = $_POST["id"];
    $titreValue = $_POST["titre"];  

    if (empty($idValue) || empty($titreValue)) {
        $errorMesage = "All fields must be filled out!";
    } else {
        include('conn.php');

        $cnx = new Connection();
        $cnx->selectDatabase('datauser');

        include('movies.php');

        $movie = new Movie($idValue, $titreValue);

        $movie->insertmovie('movies', $cnx->conn);

        $successMesage = Movie::$successMsg;

        $errorMesage = Movie::$errorMsg;

        $idValue = "";
        $titreValue = "";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create movie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5 ">


        <h2>SIGN UP</h2>


    <?php


    if(!empty($errorMesage)){
  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>$errorMesage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div>";
    }
       ?>


        <br>
        <form method="post">
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="id">Id:</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $idValue ?>" class="form-control" type="text" id="id" name="id">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="titre">Titre:</label>
                    <div class="col-sm-6">
                        <input  value="<?php echo $titreValue ?>" class="form-control" type="text" id="titre" name="titre">
                    </div>
            </div>
            


            <?php
            if(!empty($successMesage)){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div>";
            }
  ?>  
      


            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class=" btn btn-primary">add</button>
                    </div>
                    
            </div>
        </form>


    </div>


</body>
</html>
