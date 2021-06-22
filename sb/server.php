<?php 

session_start();    

$firstname="";
$lastname="";
$email="";
 
$errors = array();

$conn = new mysqli('localhost','root','','cms_db');

if (isset($_POST['register'])){
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);

    if(empty($firstname)){
        array_push($errors, "firstname if required");
    }
    if(empty($lastname)){
        array_push($errors, "lastname if required");
    }
    if(empty($email)){
        array_push($errors, "email if required");
    }
    if(empty($password_1)){
        array_push($errors, "password if required");
    }
    if(empty($password_2)){
        array_push($errors, "password if required");
    }
   
    if ($password_1 != $password_2){
        array_push($errors, "the two passwords do not match");
    }

    if(count($errors) == 0){
        $password = ($password_1);
        $sql= "INSERT INTO user (firstname,lastname,email,pass)
                      VALUES ('$firstname','$lastname','$email','$password')";
                      mysqli_query($conn,$sql); 

                      $_SESSION['firstname'] = $firstname;
                      $_SESSION['sucess']    ="you are now login";
                      header('location: index.php');
    }

}
?>