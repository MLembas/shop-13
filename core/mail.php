<?php 
//read json
$json = file_get_contents('../goods.json');
$json = json_decode($json, true);

$message = '';
$message .= '<h1>Cart from shop</h1>';
$message .='<p>PhoneNumber: '.$_POST['ephone'].'</p>';
$message .='<p>Email: '.$_POST['email'].'</p>';
$message .='<p>Client: '.$_POST['ename'].'</p>';

$cart = $_POST['cart'];
$sum = 0;

foreach ($cart as $id=>$count){
   $message .=$json[$id]['menu__title'].' ----';
   $message .=$count.' ---';
   $message .=$count*$json[$id]['menu__price'];
   $message .='<br>';
   $sum =$sum + $count*$json[$id]['menu__price'];
}
$message .='Whole sum: '.$sum;
//print_r($message);


//отправка
$to = 'leonnymaks@gmail.com'.',';
$to .=$_POST['email'];
$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$m = mail($to, 'Order at shop', $spectext.$message.'</body></html>, $headers');
if($m){echo 1;} else {echo 0;}
?>