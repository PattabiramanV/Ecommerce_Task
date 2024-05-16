<?php

class ConnectDb {

    public $connection;

    public function __construct($server = 'localhost', $userName = 'dckap', $password = 'Dckap2023Ecommerce', $dbName = 'ecommerce_js') {
        // Establishing database connection
        $this->connection = new mysqli($server, $userName, $password, $dbName);

        // Check if connection was successful
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function setQuery($query) {
     

        $result = $this->connection->query($query);

        // Check if query execution was successful
        // if (!$result) {
        //     die("Query failed: " . $this->connection->error);
        // }

        // Fetching results as associative array
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // // Free result set
        // $result->free();

        // // Return the fetched data
        return $data;
    }

    // public function __destruct() {
    //     // Closing database connection when object is destroyed
    //     $this->connection->close();
    // }
}

// Example usage:
// $db = new ConnectDb();
// $query = "SELECT * FROM your_table";
// $data = $db->setQuery($query);
// print_r($data);

?>
