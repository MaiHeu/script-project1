<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 19.12.2018
 * Connects to database
 */

$servername = "localhost";
$username = "";
$password ="";
$dbname="fi2017_hekrki";

/**
 * @param $servername
 * @param $dbname
 * @param $username
 * @param $password
 * @return PDO
 */
function connectDatabase($servername, $dbname, $username, $password)
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

}