<?php
class Favmovie{
private $idu;
private $idm;


public function __construct($idu,$idm){
$this->idu=$idu;
$this->idm=$idm;
}

public static function updatefav($tableName, $conn, $idu, $idm)
{
    $sql = "SELECT idm FROM $tableName WHERE idu='$idu' AND idm='$idm'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $sqlDelete = "DELETE FROM $tableName WHERE idu='$idu' AND idm='$idm'";
        mysqli_query($conn, $sqlDelete);
    } else {
        $sqlInsert = "INSERT INTO $tableName (idu, idm) VALUES ('$idu', '$idm')";
        mysqli_query($conn, $sqlInsert);
    }
}


 public static function selectfavMovies($tableName, $conn,$idu){
            $sql = "SELECT  idm FROM $tableName WHERE idu='$idu'";
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result) > 0) {
                $data = [];
                while($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        

 static function selectfavMovieById($tableName,$conn,$idm){
            $sql= "SELECT idu,idm FROM $tableName WHERE idm = '$idm'";
            $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_assoc($result);
                return $row;}
            }

 


}
?>