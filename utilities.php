<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 19.12.2018
 * Ein paar schöne Funktionen...
 */

include_once 'databaseconnect.php';

$id = 1;

/**
 * @param $id --Int
 * @return array --InteresseIDs von $id
 */
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

function submitUserInterest($id){
    /** TODO:
     *   - SQL Statement schreiben um die ausgewählten Interesen in userinteressen zu schreiben
     *   - Submitbutton für Forms
     *   - Siehe https://stackoverflow.com/questions/20738329/how-to-call-a-php-function-on-the-click-of-a-button
     */

}

function printInterests($id, $precheck){
    //Query um alle vorhandenen Interessen aufzulisten
    $queryBezeichnung = "SELECT interessen.Bezeichnung, Interessen.InteressenID
                         FROM interessen";

    $conn = connectDatabase();
    echo "<form>";
    echo "<fieldset>";
    if ($precheck == false){
        foreach ($conn -> query($queryBezeichnung) as $row){
            echo "<label>";
            echo "<input type=\"checkbox\" value=".$row['Bezeichnung']."\" name=".$row['Bezeichnung']."\" id=FormsInteresse".$row['InteressenID'].">";
            print $row['Bezeichnung'];
            echo "</label>";
            echo "<br />";
        }
    }
    else {
        $userinterest = getUserInterestById($id);
        foreach ($conn->query($queryBezeichnung) as $row) {
            echo "<label>";
                if ($userinterest['Interesse'] == $row['InteressenID']){
                    echo "<input type=\"checkbox\" value=" . $row['Bezeichnung'] . "\" name=" . $row['Bezeichnung'] . "\" id=FormsInteresse" . $row['InteressenID'] . " checked>";
                }
                else {
                    echo "<input type=\"checkbox\" value=" . $row['Bezeichnung'] . "\" name=" . $row['Bezeichnung'] . "\" id=FormsInteresse" . $row['InteressenID'] . ">";
                }
            print $row['Bezeichnung'];
            echo "</label>";
            echo "<br />";
        }
    }
    echo "</fieldset>";
    echo "</form>";

    $conn = null;
}
