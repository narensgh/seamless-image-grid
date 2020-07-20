<?php 

require_once "./libs.php";
require_once "./config.php";

class Index {
  private $libs;
  function __construct() {
    if (!$this->libs) {
      $this->libs = new Libs();
      
    }
  }

  public function initProcess($config, $pageno) {
    $apipath = $config["apipath"];
    if ($pageno) { 
      $apipath .= "/page/". $pageno;
    }
    $records = $this->libs->fetchRecord($apipath);  
    $this->sendResponse($records);
  }

  public function sendResponse($data) {
    echo json_encode($data);
    die;
  }

}
$index = new Index();
$requestData = $_GET;
$pageno = 0;
if (isset($requestData["pageno"])) {
  $pageno = $requestData["pageno"];
}
if(isset($requestData["ajax"])) {
  $index->initProcess($config, $pageno);
} else {
  require_once "index_view.php";
}

