<?php

class Libs {

    private static $obj;
    private static $config;

    private final function __costructor() {
        $this->log(__CLASS__ . " initialize only once ");
    }

    public static function getInstance($config) {
        if (!isset(self::$obj)) {
            self::$obj = new Libs();
            self::$config = $config;
        }
        return self::$obj;
    }

    public function log($msg) {
        $finalmsg = date("Y-m-d H:i:s") . " : " . $msg . PHP_EOL;
        file_put_contents(self::$config["logpath"], $finalmsg, FILE_APPEND);
    }

    public function getUUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0x0fff) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public function getRemoteData($pid, $apipath) {
        $startTime = microtime(true);
        $this->log("$pid - Calling api - $apipath");
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $apipath,
            CURLOPT_USERAGENT => 'PHP API'
        ]);
        $resp = curl_exec($curl);
        if (!curl_exec($curl)) {
            $this->log($pid . ' - Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        }
        curl_close($curl);
        $endTime = microtime(true);
        $this->log("$pid - time taken to call api - $apipath, " . ($endTime - $startTime) * 1000 . " MS");
        return $resp;
    }

}
