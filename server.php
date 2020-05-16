<?php
     session_start();

    $username ="";
    $registrationno ="";
    $email ="";
    $errors = array();
    //connect to the server
     $db = mysqli_connect('localhost','root', 'root','registration');

//if the register button is clicked

    if (isset($_POST['register'])) {
        $username = mysqli_real_escape_string($db,$_POST['username']); 
        $registrationno = mysqli_real_escape_string($db,$_POST['registrationno']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);


 //ensure that the fields are properly filled

         if (empty($username)) {
             array_push($errors, "username is required");
    }
         if (empty($registrationno)) {
             array_push($errors, "registration no is required");
    }
          if (empty($email)) {
              array_push($errors, "email id is required");
    }
          if (empty($password_1)) {
             array_push($errors, "password is required");
    }
          if ($password_1 != $password_2) {
             array_push($errors,"two passwords doesnot match");
    }

     //if there are no errors then save useer to database



          if (count($errors) == 0) {
              $password = md5($password_1);
              $sql = "INSERT INTO users ( username, registrationno, email, password) 
              VALUES ('$username', '$registrationno','$email', '$password')"; 
              mysqli_query($db, $sql); 
              $_SESSION[ 'username'] = $username;
              $_SESSION[ 'success'] = "you are now logged in";
              header('location: index.php');
     }
    }

//log user from login page


if (isset($_POST['login'])) {
   
        $username = mysqli_real_escape_string($db,$_POST['username']); 
        $password = mysqli_real_escape_string($db,$_POST['password']);

         if (empty($username)) {
             array_push($errors, "username is required");
          }
         if (empty($password)) {
             array_push($errors, "password is required");
           }

           if (count($errors) == 0 ) {
               $password = md5($password);
               $query = "SELECT * FR0M users WHERE username='$username' AND password='$password'";
               $result = mysqli_query($db,$query);
               if (mysqli_num_rows($result) == 0) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "you are now logged in";
                header('location: index.php'); 
               }else{
                   array_push ($errors, "wrong username/password combination");
                   
           }
        }
    }

//logout
     if (isset($_GET['logout'])) {
         session_destroy();
         unset($_SESSION['username']);
         header('location: login.php');
     }

?>