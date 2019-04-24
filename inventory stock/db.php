<?php


class Database{

    //this $con stores our connection.
    public $con;

    // __construct() is a functon which is automatically called on creating object of the class.

    public function __construct(){

        $this->con = mysqli_connect("localhost","root","","test");
        // if($this->con)
        // {
        //     // echo "connected";
        // }
        // else{
        //     echo "not connected";
        // }

    }


}











?>