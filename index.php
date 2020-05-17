<?php include('server.php'); 
if(empty($_SESSION['username'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
     <title> user registration system using php and my sql</title>
     <link rel="stylesheet" type="text/css" href="style.css">
     <style>
         .button {
            background-color:white;
            border:black;
            color:red;
            padding:16px 32px;
            text-align: center;
            text-decoration: none;
            display:inline-block;
            font-size:20px;
            margin: 4px 2px;
            cursor: pointer;
            position:absolute;
            left:725px;
            top: 300px;


         }
         </style>
     </head>
     <body>
          <div class ="header">
          <h2>Home page</h2>
          </div>
           <div class="content">
               <?php if (isset($_SESSION['success'])): ?>
                <div class=" error success">
                    <h3>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                            </h3>
               </div>
                <?php endif ?>
                <?php if (isset($_SESSION["username"])): ?>
                    <p>welcome <strong><?php echo $_SESSION['username'];?></strong></p>
                    <p><a href="index.php?logout='1'" style="color: red;">logout</a></p>
                    <?php endif ?>
           </div>
        

           

           <a href="index11.html" class="button">chat with us</a>
  


</body>
</html> 