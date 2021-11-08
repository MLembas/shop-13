<?php
   $dbc = mysqli_connect("shop", "root", "", "shop");
   if(!isset($_COOKIE['user_id'])){
      if(isset($_POST['submit'])){
         $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
         $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
         if(!empty($user_username) && !empty($user_password)){
            $query = "SELECT `user_id` , `username` FROM `signup` WHERE 
            username = '$user_username' AND password = '$user_password'";
            $data = mysqli_query($dbc, $query);
            if(mysqli_num_rows($data) == 1){
               $row = mysqli_fetch_assoc($data);
               setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));
               setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
               $homeurl = 'http://' . $_SERVER['HTTP_HOST'];
               header('Location: ' . $homeurl);
            }
            else{
               echo 'Login or password is wrong';
            }
         }
         else{
            echo 'Wrong login or password';
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
   <title>Sign in</title>
</head>
<body>
   <header>
<!-- 'shop', 'root', '', 'shop' -->
   </header>
   <content>
      <div class="sign__form">
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Login: </label>
            <input type="text" name="username"><br>
            <label for="password">Password: </label>
            <input type="password" name="password"><br>
            
            <button name="submit">Sign In</button>
            <a href="signup.php">Sign Up</a>

         </form>
         
      </div>
   </content>
   <footer>

   </footer>
</body>
</html>