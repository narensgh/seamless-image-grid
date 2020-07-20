<?php 
class Libs {
  function __construct() {

  }

  function fetchRecord($url) {
    $result = file_get_contents($url);
    $result = json_decode($result);
    return $result;
  }
}

