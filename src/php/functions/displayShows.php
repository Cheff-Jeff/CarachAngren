<?php
session_start();
if(isset($_SESSION['Shows'])){
  print json_encode($_SESSION['Shows']);
}else{
  include '../../../config.php';
  include 'getShows.php';
  GetShows($host, $api, $root);
  print json_encode($_SESSION['Shows']);
}