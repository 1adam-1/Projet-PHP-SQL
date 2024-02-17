<?php


$idValue = "";
$titreValue = "";

$errorMesage = "";
$successMesage = "";


include("conn.php");
$cnx=new Connection();
$cnx->selectDatabase('datauser');
include("movies.php");
$id = $_GET['id'];
if($_SERVER['REQUEST_METHOD']=='GET'){


    $id = $_GET['id'];


$row=Movie::selectMovieById('movies',$cnx->conn,$id);
$idValue = $row["id"];
$titreValue = $row["titre"];
}


else if(isset($_POST["submit"])){

    $idValue = $_POST["id"];
    $titreValue = $_POST["titre"];
   
    if(empty($idValue) || empty($titreValue)  ){
            $errorMesage = "all fileds must be filed out!";
    }else{
        $movie=new Movie($idValue,$titreValue);
        Movie::updateMovie($movie,'movies',$cnx->conn,$id);
        header(("location:readmovie.php"));
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5 ">


        <h2>Update</h2>


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
                    <label class="col-form-label col-sm-1" for="fname">First Name:</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $idValue ?>" class="form-control" type="text" id="fname" name="id">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="lname">Last Name:</label>
                    <div class="col-sm-6">
                        <input  value="<?php echo $titreValue ?>" class="form-control" type="text" id="lname" name="titre">
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
                        <button name="submit" type="submit" class=" btn btn-primary">Update</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="read.php">Cancel</a>
                    </div>
            </div>
        </form>


    </div>


</body>
</html>
