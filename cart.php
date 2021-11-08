



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/style.css" rel="stylesheet">
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <title>Cart</title>
</head>
<body>
   <div class="wrapper">
      <div class="container">
         <header>
          <div class="row">
            <div class="col-12">
               <div class="con__for__head">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                         </button>
                       <a class="navbar-brand" href="#Home" class="nav-link"  onclick="window.location.href = 'https://shop-13/';"><img src="/img/logo.png"></a>
                       <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- <li><a href="#Home" class="nav-link"  onclick="window.location.href = 'https://shop-13/';"><img src="/img/logo.png"></a></li> -->
                        <li><a href="#Home" class="nav-link" id="Home" onclick="window.location.href = 'https://shop-13/';">Home</a></li>
                        <li><a href="#About__us" class="nav-link" onclick="window.location.href = 'https://shop-13/';">About us</a></li>
                        <li><a href="#Menu" class="nav-link" onclick="window.location.href = 'https://shop-13/';">Menu</a></li>
                        <li><a href="#Features" class="nav-link" onclick="window.location.href = 'https://shop-13/';">Features</a></li>
                        <li><a href="#Contact__us" class="nav-link" onclick="window.location.href = 'https://shop-13/';">Contact us</a></li>
                      </ul>
                    </div>  
                  </div>
               </nav>
               <button onclick="window.location.href = 'https://shop-13/cart.html';" type="button"  class="btn0">Cart</button>
               <button onclick="window.location.href = 'https://shop-13/signin.php';" type="button"  class="btn0">Sign in</button>
            </div>  
          </div>
        </header>

         <main>
           <div class="main__cart__for__flex">
               
            <div class="main__cart">

            </div>
            <div class="email__field">
               <p>Name: <input type="text" id="ename"></p>
               <p>Email: <input type="text" id="email"></p>
               <p>Phone: <input type="text" id="ephone"></p>
               <p><button class="send-email">BBuy</button></p>
               <p><button class="send-email">BBuy</button></p>
                  <?php
                  if(isset( $_POST['Exit']))
                  {
                    unset($_COOKIE['user_id']);
                    unset($_COOKIE['username']);
                    setcookie('user_id', '', -1, '/');
                    setcookie('username', '', -1, '/');
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'];
                    header('Location: ' . $home_url);

                  }
                  ?>
                  <form method="POST">
                    <input type="submit" name="Exit" value="Exit" />
                  </form>
               <!-- <p><button class="Exit">Exit</button></p> -->
               <?php
if (isset($_COOKIE["user_id"])) {
  // то выполняем действия необходимые
  echo 1;
}
else{
  echo 0;
}
?>
            </div>
           </div>
         </main>
      </div>
      <div class="footer__for__back">
         <footer class="text-center text-white">
            <div class="container p-4">
              <div class="mail__sec">
               <section class="">
                  <form action="">
                    <div class="row d-flex justify-content-center">
                      <div class="col-auto" class="yyy" id="Contact__us">
                        <p class="pt-2">
                          <strong>Sign up for our newsletter</strong>
                        </p>
                      </div>
                      <div class="col-md-5 col-12">
                        <div class="form-outline form-white mb-4">
                          <input type="email" id="form5Example21" class="form-control" />
                          <label class="form-label" for="form5Example21">Email address</label>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button type="submit" class="btn btn-outline-light mb-4">
                          Subscribe
                        </button>
                      </div>
                    </div>
                  </form>
                </section>
              </div>
              <section class="">
                <div class="row">
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 a href="#Home" class="rrr"><img src="/img/logo.png" class="text-white" class="text-uppercase" ></h5>
          
                    <ul class="list-unstyled mb-0">
                      <li>
                        <a href="#!" class="text-white">www.company name.com</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">www.company name.com</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Phone: +7 485-118-03-25</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 a href="#!" class="text-uppercase">Home</h5>
          
                    <ul class="list-unstyled mb-0">
                      <li>
                        <a href="#!" class="text-white">Landingpage</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Documentation</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Referral Program</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">UI & UX Design</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Web Design</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                     <h5 a href="#!" class="text-uppercase">Menu</h5>
          
                     <ul class="list-unstyled mb-0">
                       <li>
                         <a href="#!" class="text-white">Landingpage</a>
                       </li>
                       <li>
                         <a href="#!" class="text-white">Documentation</a>
                       </li>
                       <li>
                         <a href="#!" class="text-white">Referral Program</a>
                       </li>
                       <li>
                         <a href="#!" class="text-white">UI & UX Design</a>
                       </li>
                       <li>
                         <a href="#!" class="text-white">Web Design</a>
                       </li>
                     </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                     <h5 a href="#!" class="text-uppercase">Company</h5>
          
                     <ul class="list-unstyled mb-0">
                       <li>
                         <a href="#!" class="text-white">Landingpage</a>
                       </li>
                       <li>
                         <a href="#!" class="text-white">Documentation</a>
                       </li>
                       <li>
                         <a href="#!" class="text-white">Referral Program</a>
                       </li>
                       <li>
                         <a href="#!" class="text-white">UI & UX Design</a>
                       </li>
                       <li>
                         <a href="#!" class="text-white">Web Design</a>
                       </li>
                     </ul>
                  </div>
                </div>
              </section>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              MC Corp © 2021 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/"></a>
            </div>
          </footer>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/cart.js"></script>
</body>
</html>