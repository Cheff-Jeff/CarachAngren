<?php
$host = "http://localhost/";
$root = dirname(__FILE__);
if (strpos($root, 'httpd.www')){
  $root = str_replace('httpd.www/', '', $root);
}