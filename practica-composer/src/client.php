<?php

include_once 'DBConn.php';

class Client extends DBConn {

    function getAllClients() {
        $result = $this->connect()->query('SELECT * FROM clients');

        return $result;
    }

    public function getByDomain($letter) {
        $sql = 'SELECT * FROM clients WHERE clientEmail LIKE "%' . $letter.'%"';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }

    public function getByDate($date) {
        $sql = 'SELECT * FROM clients WHERE date = "'.$date.'"';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        

        return $result;
    }
}

?>