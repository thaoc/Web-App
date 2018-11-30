<?php

/**
 * A class file to connect to database
 */
class DB_CONNECT {

    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }

    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once 'db-connect.php';
        $link = mysqli_connect('107.180.46.186', 'damascus_way_mob', 'b^l}+mS_T0FH', 'damascus_way');

        // Connecting to mysql database
        $con = mysqli_connect('107.180.46.186', 'damascus_way_mob', 'b^l}+mS_T0FH') or die(mysqli_error($link));

        // Selecing database
        $db = mysqli_select_db($link, 'damascus_way') or die(mysqli_error($link)) or die(mysqli_error($link));

        // returing connection cursor
        return $con;
    }

    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        require_once 'db-connect.php';
        $link = mysqli_connect('107.180.46.186', 'damascus_way_mob', 'b^l}+mS_T0FH', 'damascus_way');
        mysqli_close($link);
    }

}

?>