<?php
class Movie{
public $id;
public $titre;
public static $errorMsg = "";
public static $successMsg="";

public function __construct($id,$titre){
$this->id=$id;
$this->titre=$titre;
}

public function insertMovie($tableName,$conn){
    $sql = "INSERT INTO $tableName (titre,id)  VALUES ('$this->titre', '$this->id')";

    if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Your movie has been added ";
    } else {
     self::$errorMsg = mysqli_error($conn);
    }
        }

public static function selectMovies($tableName, $conn){
    $sql = "SELECT titre, id FROM $tableName";
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result) > 0) {
                $data = [];
                while($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        
 static function selectMovieByName($tableName,$conn,$name){
            $sql= "SELECT titre,id FROM $tableName WHERE titre = '$name'";
            $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_assoc($result);
                return $row;}
            }

 static function selectMovieById($tableName,$conn,$id){
            $sql= "SELECT titre,id FROM $tableName WHERE id = '$id'";
            $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_assoc($result);
                return $row;}
            }

 static function updateMovie($movie,$tableName,$conn,$id){
    $sql = "UPDATE $tableName SET titre='$movie->titre',id='$movie->id' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            self::$successMsg= "New record updated successfully";}
         else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
            }}
    
static function deleteMovie($tableName,$conn,$id){
    $sql = "DELETE FROM $tableName WHERE id='$id' ";

    if (mysqli_query($conn, $sql)) {
        self::$successMsg= "Record deleted successfully";
    } else {
        self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
    }                
                }
 


}
?>