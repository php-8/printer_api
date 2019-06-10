<?php

include 'model/AppModel.php';

//use App\models;

class Client extends AppModel {

    public $array;
    public $clientDatabase;
    public $name;
    public $price_start;
    public $price_end;
    public $method;

    public function __construct($name ='0', $price_start ='0', $price_end = '0', $method = '0') {
        $this->name = $name;
        $this->price_start = $price_start;
        $this->price_end = $price_end;
        $this->method = $method;

        parent::__construct();
    }

    public function GetArray () {
        $url = "server.com/server.php?name=" . urlencode($this->name) ."&price_start=". $this->price_start ."&price_end=" . $this->price_end . "&method=" . $this->method;
        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($client);
        $result = json_decode(json_encode($response), True);
        $this->array = json_decode($result,true);  
        return $this->array;
    }

    public function ClientStore() {
        $this->clientDatabase['data']['0'] = array('id' => '1', 'name' => 'random', 'description' => 'It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"', 'img' => '7.jpg', 'price' => '3', 'category_id' => '0', 'created' => '0', 'modified' => '0');
        $this->clientDatabase['data']['1'] = array('id' => '1', 'name' => 'The standard', 'description' => 'chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"', 'price' => '3', 'img' => '8.jpg', 'category_id' => '0', 'created' => '0', 'modified' => '0');
        //$this->clientDatabase = $value;

        try {
            $st = $this->dbconnect->prepare("SELECT * FROM items"); 
            $st->execute();
            $count=$st->rowCount();
            $data=$st->fetchAll();
            $db = null;
        if($count>0) {
            return $data;
        } else {
            $nodata = 'null';
            return $nodata;
        } 
    }
    catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
    }




        return $this->clientDatabase['data'];
    }

    // public function mergeValue() {
    //     $merged = array_merge($this->array, $this->clientDatabase['data']);
    //     //$merged = array_unshift($this->arrayue, $this->clientDatabase['data']);
    //     return $merged;
    // }

    public function Toster() {
        $url = "printer.com/administrator/api/server.php?&method=test";
        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($client);
        $result = json_decode(json_encode($response), True);
        $this->array = json_decode($result,true);  
        return $this->array;
    }
}

?>