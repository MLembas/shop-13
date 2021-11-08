<?php
$serververname = "shop";
$username = "root";
$password = "";
$dbname = "shop";

function connect(){
   $conn = mysqli_connect("shop", "root", "", "shop");
   if(!$conn){
      die("connection failed: " . mysqli_connect_error());
   }
   return $conn;
}

function init(){
   $conn = connect();
   $sql = "SELECT id, menu__title FROM goods";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0){
      $out = array();
      while($row = mysqli_fetch_assoc($result)){
         $out[$row["id"]] = $row;
      }
      echo json_encode($out);      
   } else{
      echo "0";
   }
   mysqli_close($conn);
}

function selectOneGoods(){
   $conn = connect();
   $id = $_POST['gid'];
   $sql = "SELECT * FROM goods WHERE id = '$id'";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      echo json_encode($row); 
   } else{
      echo "0";
   }
   mysqli_close($conn);
}

function updateGoods(){
   $conn = connect();
   $id = $_POST['id'];
   $img = $_POST['gimg'];
   $menu__title = $_POST['gmenu__title'];
   $menu__price = $_POST['gmenu__price'];
   $menu__descr = $_POST['gmenu__descr'];
   $menu__raiting = $_POST['gmenu__raiting'];
   $menu__order = $_POST['gmenu__order'];

   $sql = "UPDATE goods SET menu__img = '$img', menu__title = '$menu__title', menu__price = '$menu__price', menu__text = '$menu__descr', menu__raiting = '$menu__raiting', ord = '$menu__order' WHERE id = '$id'";

   if (mysqli_query($conn, $sql)){
      echo "1";
   } else{
      echo "Error updating record: " . mysqli_error($conn);
   }
   mysqli_close($conn);
   writeJSON();
}

function newGoods(){
   $conn = connect();
   $img = $_POST['gimg'];
   $menu__title = $_POST['gmenu__title'];
   $menu__price = $_POST['gmenu__price'];
   $menu__descr = $_POST['gmenu__descr'];
   $menu__raiting = $_POST['gmenu__raiting'];
   $menu__order = $_POST['gmenu__order'];

   $sql = "INSERT INTO goods(menu__img, menu__title, menu__price, menu__text, menu__raiting, ord )
VALUES ( '$img',  '$menu__title', '$menu__price', '$menu__descr', '$menu__raiting', '$menu__order')";

   if (mysqli_query($conn, $sql)){
      echo "1";
   } else{
      echo "Error updating record: " . mysqli_error($conn);
   }
   mysqli_close($conn);
   writeJSON();
}

function writeJSON(){
   $conn = connect();
   $sql = "SELECT * FROM goods";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0){
      $out = array();
      while($row = mysqli_fetch_assoc($result)){
         $out[$row["id"]] = $row;
      }
      $a = file_put_contents('../goods.json', json_encode($out));     
      echo 'write+' .$a;
   } else{
      echo "0";
   }
   mysqli_close($conn);
}

function loadGoods(){
   $conn = connect();
   $sql = "SELECT * FROM goods";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0){
      $out = array();
      while($row = mysqli_fetch_assoc($result)){
         $out[$row["id"]] = $row;
      }
      echo json_encode($out);     
   } else{
      echo "0";
   }
   mysqli_close($conn);
}

function loadSingleGoods(){
   $id = $_POST['id'];
   $conn = connect();
   $sql = "SELECT * FROM goods WHERE id='$id'";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0){
      
      $row = mysqli_fetch_assoc($result);
      
      echo json_encode($row);     
   } else{
      echo "0";
   }
   mysqli_close($conn);
}