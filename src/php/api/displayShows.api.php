<?php
session_start();
if(isset($_SESSION['Shows'])){
  print json_encode($_SESSION['Shows']);
}else{
  include '../../../config.php';
  include 'getShows.api.php';
  GetShows($host);
  print json_encode($_SESSION['Shows']);
}