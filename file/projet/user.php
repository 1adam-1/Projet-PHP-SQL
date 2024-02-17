<?php
class User{
private $id;
private $firstname;
private $lastname;
private $email;
private $password;
private $user;
private $reg_date;
private $id_fav;

public static $errorMsg = "";
public static $successMsg="";

public function __construct($firstname,$lastname,$email,$password,$user){
$this->firstname=$firstname;
$this->lastname=$lastname;
$this->email=$email;
$this->password=password_hash($password, PASSWORD_DEFAULT);
$this->user=$user;

}
public function insertUser($tableName,$conn){
    $sql = "INSERT INTO $tableName (firstname, lastname, email,password,user)
    VALUES ('$this->firstname', '$this->lastname', '$this->email','$this->password','$this->user')";

    if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Your account has been added ";
    } else {
     self::$errorMsg = mysqli_error($conn);
    }
        }

 public static function selectAllUsers($tableName,$conn){                                                
                $sql =" SELECT firstname,lastname,email,id,user FROM $tableName " ;
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){  
                    $data = [];
                    while($row=mysqli_fetch_assoc($result)){
                        $data[]=$row;
                    } 
                    return $data;    
                }
            }

public static function UserCheck($tableName,$conn,$email){                                                
    $sql= "SELECT password,id FROM $tableName WHERE email = '$email'";
    $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
        return $row;}
            }



 static function selectUserById($tableName,$conn,$id){
            $sql= "SELECT firstname,lastname,email,user FROM $tableName WHERE id = '$id'";
            $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_assoc($result);
                return $row;}
            }

 static function updateUser($user,$tableName,$conn,$id){
    $sql = "UPDATE $tableName SET lastname='$user->lastname',firstname='$user->firstname',email='$user->email',user='$user->user' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            self::$successMsg= "New record updated successfully";}
         else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
            }}
    
static function deleteUser($tableName,$conn,$id){
    $sql = "DELETE FROM $tableName WHERE id='$id' ";

    if (mysqli_query($conn, $sql)) {
        self::$successMsg= "Record deleted successfully";
    } else {
        self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
    }                
                }
                      
 }
?>