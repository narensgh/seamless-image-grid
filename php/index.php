<?php

require_once './config.php';
require_once './Libs.php';

class Index {

    private $libs;
    private $pid;

    public function __construct($metadata) {
        $this->libs = Libs::getInstance($metadata["config"]);
        $this->pid = $this->libs->getUUID();
        $this->libs->log("$this->pid - Index initialized");
    }

    public function start($apipath) {
        $resp = $this->libs->getRemoteData($this->pid, $apipath);
        return $resp;
    }

}

$metadata = array(
    "config" => $config
);
$index = new Index($metadata);
$response = $index->start($metadata["config"]["apipath"]);
require_once './index_view.php';