<?php include ('server.php') ?>
<!DOCTYPE html>
<html>
<head>
     <title> user registration system using php and my sql</title>
     <link rel="stylesheet" type="text/css" href="style.css">
     </head>
     <body>
          <div class ="header">
          <h2>login</h2>
          </div>

          <form method="post" action="login.php">
          <?php include('errors.php'); ?>
             <div class="input-group">
               <label>Username</label>
               <input type="text" name="username">
               </div>
                
                <div class="input-group">
               <label>password</label>
               <input type="password" name="password">
               </div>
               <div class="input-group">
                     <button type="submit" name="login" class="btn">login<button>
                     </div>
                     <p>
                          Not yet a member?<a href="register.php">sign up</a>
                     </p>
            </form>
</body>
</html>