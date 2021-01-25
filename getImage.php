<?php
$link = mysqli_connect('localhost','root','','np') or die(mysqli_error);
$email = $_GET['email'];
  $sql = "SELECT * FROM users WHERE email = '".$email."'";
  $result = mysqli_query($link,$sql);
  $row = mysqli_fetch_assoc($result);
  header("Content-type: image/jpeg");
  echo $row['photo'];
 ?>