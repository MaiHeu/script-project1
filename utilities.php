<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 19.12.2018
 * Ein paar schöne Funktionen...
 */

include_once 'databaseconnect.php';

$id = 1;

function getInterestById ($id){
    //Query um festzustellen, welche Interessen $id bereits ausgewählt hat
    $queryGetInterests = "SELECT userinteressen.User, userinteressen.Interesse, interessen.Bezeichnung
                          FROM userinteressen
                          INNER JOIN interessen ON (userinteressen.Interesse = interessen.InteressenID)
                          WHERE userinteressen.User = '$id'";

    $conn = connectDatabase();

    $result = $conn -> query($queryGetInterests);
    echo '<pre>'; print_r($result); echo '</pre>';
    foreach ($conn -> query($queryGetInterests) as $row){
        print $row['Interesse']."\t";
        print $row['User']."\t";
        print $row['Bezeichnung']."\t"."<br />";
    }
}


function printInterests($id){
    //Query um alle vorhandenen Interessen aufzulisten
    $queryBezeichnung = "SELECT Bezeichnung
                         FROM interessen";

    $conn = connectDatabase();

    $result = $conn -> query($queryBezeichnung);
    echo '<pre>'; print_r($result); echo '</pre>';

    /**TODO
     * -Select from interessen
     * for each zeile in interessen
     * print spalte[i]
     */
}
