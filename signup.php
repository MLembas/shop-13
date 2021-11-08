<?php
$dbc = mysqli_connect("shop", "root", "", "shop");
if(isset($_POST['submit'])){
   $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
   $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
   $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

   if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)){
      $query = "SELECT * FROM `signup` WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if(mysqli_num_rows($data) == 0){
         $query ="INSERT INTO `signup` (username, password) VALUES ('$username', '$password2')";
         mysqli_query($dbc, $query);
         echo 'now you can log in';
         mysqli_close($dbc);
         exit();
      }
      else{
         echo 'login already exist';
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/style.css" rel="stylesheet">
   <title>Sign up</title>
</head>
<body>
   <header>
<!-- 'shop', 'root', '', 'shop' -->
   </header>
   
      <content>
      <section>
      <?php
         if(empty($_COOKIE['username'])){
      ?>      
            <div class="sign__form">
               <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <label for="username">Enter login: </label>
                  <input type="text" name="username"><br>
                  <label for="password">Enter password: </label>
                  <input type="password" name="password1"><br>
                  <label for="password">Repeat password: </label>
                  <input type="password" name="password2"><br>
                  <button name="submit">Sign up</button>
               </form>
            </div>
      <?php      
         }
         else{
     ?>
            <p><a href="myprofile.php">Profile</a></p>
            <p><a href="exit.php">Exit</a></p>
      <?php      
         }
      ?>   
      </section>
      
      </content>
   <footer>

   </footer>
</body>
</html>