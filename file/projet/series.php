<?php 

class Serie{
private $id;
private $titre;
public static $errorMsg = "";
public static $successMsg="";

public function __construct($id,$titre){
$this->id=$id;
$this->titre=$titre;
}

public function insertSerie($tableName,$conn){
    $sql = "INSERT INTO $tableName (titre,id)  VALUES ('$this->titre', '$this->id')";

    if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Your serie has been added ";
    } else {
     self::$errorMsg = mysqli_error($conn);
    }
        }

public static function selectSeries($tableName, $conn){
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

        
static function selectSerieByName($tableName,$conn,$name){
            $sql= "SELECT titre,id FROM $tableName WHERE titre = '$name'";
            $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_assoc($result);
                return $row;}
            }

 static function selectSerieById($tableName,$conn,$id){
            $sql= "SELECT titre,id FROM $tableName WHERE id = '$id'";
            $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_assoc($result);
                return $row;}
            }

 static function updateSerie($serie,$tableName,$conn,$id){
    $sql = "UPDATE $tableName SET titre='$serie->titre',id='$serie->id' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            self::$successMsg= "New record updated successfully";}
         else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
            }}
    
static function deleteSerie($tableName,$conn,$id){
    $sql = "DELETE FROM $tableName WHERE id='$id' ";

    if (mysqli_query($conn, $sql)) {
        self::$successMsg= "Record deleted successfully";
    } else {
        self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
    }                
                }
                      
}



?>