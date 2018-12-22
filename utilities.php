<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 19.12.2018
 * Ein paar schöne Funktionen...
 */

include_once 'databaseconnect.php';

$id = 1;

function getUserInterestById ($id){
    //Query um festzustellen, welche Interessen $id bereits ausgewählt hat
    $queryGetInterests = "SELECT userinteressen.Interesse
                          FROM userinteressen
                          WHERE userinteressen.User = '$id'";
    $conn = connectDatabase();
    $save = array();
    foreach ($conn -> query($queryGetInterests) as $row){
        $save += $row;
    }
    $conn = null;
    return $save;
}

function printInterests(){
    //Query um alle vorhandenen Interessen aufzulisten
    $queryBezeichnung = "SELECT interessen.Bezeichnung, Interessen.InteressenID
                         FROM interessen";

    $conn = connectDatabase();

    foreach ($conn -> query($queryBezeichnung) as $row){

    }
    $result = $conn -> query($queryBezeichnung);

    $conn = null;
    //echo '<pre>'; print_r($result); echo '</pre>';

    /**TODO
     * -Select from interessen
     * for each zeile in interessen
     * print spalte[i]
     */
}
