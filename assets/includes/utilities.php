<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 19.12.2018
 * Funktionen, die das Projekt erleichtern
 * TODO:PHP Doc erstellen und modifizieren
 * TODO: Funktionen in die Entsprechenen Klassen Münzen
 */

include_once $_SERVER['DOCUMENT_ROOT'] . 'assets/includes/databaseconnect.php';

/**
 * Diese Funktion nimmt eine ID entgegen und gibt ein Datenbankobjekt zurück, die die InteressenIDs des Users enthält
 * @param $id
 * @return array //InteresseIDs von $id
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
     *   - SQL Statement schreiben um die ausgewählten Interessen in userinteressen zu schreiben
     *
     * Einfach alle Tuples Löschen und neu einfügen, einfachste lösung:
     *  DELETE FROM `userinteressen` WHERE `User` = 1
     *
         foreach($selectedInteressen as $id) {
      *  INSERT INTO `userinteressen`
      *  SET `User`= 1
      *  `Interesse`= $id;
      *  }
     * TODO: -Submitbutton Schreiben
     */
}

/**
 * Diese Funktion listet alle vorhandenen Interessen mit Checkbox auf.
 * der Parameter $id wird nur benötigt, wenn $precheck auf TRUE gesetzt wird.
 * Dabei wird die ID verwendet, um bei der Auflistung der Interessen bereits ausgewählte Interessen als checked zu markieren
 * @param int $id
 * @param bool $precheck
 * TODO: auf die neue Klassenstruktur ummünzen
 */
function printAdminInterests($id){
    //Query um alle vorhandenen Interessen aufzulisten
    $queryBezeichnung = "SELECT interessen.Bezeichnung, Interessen.InteressenID
                         FROM interessen";

    $conn = connectDatabase();
    echo "<form>";
    echo "<fieldset>";
    foreach ($conn -> query($queryBezeichnung) as $row){
        echo "<label>";
        echo "<input type=\"checkbox\" value=".$row['Bezeichnung']."\" name=".$row['Bezeichnung']."\" id=FormsInteresse".$row['InteressenID'].">";
        print $row['Bezeichnung'];
        echo "</label>";
        echo "<br />";
    }
    echo "</fieldset>";
    echo "</form>";

    $conn = null;
}

/* TODO: auf die neue Klassenstruktur ummünzen*/
function printUserinterest ($id) {
    //Query um alle vorhandenen Interessen aufzulisten
    $queryBezeichnung = "SELECT interessen.Bezeichnung, Interessen.InteressenID
                         FROM interessen";
    $querySubmit = "Oh dear I hate SQL";
    $userinterest = getUserInterestById($id);
    $conn = connectDatabase();

    echo "<form>";
    echo "<fieldset>";
    foreach ($conn->query($queryBezeichnung) as $row) {
        echo "<label>";
        if ($userinterest['Interesse'] == $row['InteressenID']) {
            echo "<input type=\"checkbox\" value=" . $row['Bezeichnung'] . "\" name=" . $row['Bezeichnung'] . "\" id=FormsInteresse" . $row['InteressenID'] . " checked>";
        } else {
            echo "<input type=\"checkbox\" value=" . $row['Bezeichnung'] . "\" name=" . $row['Bezeichnung'] . "\" id=FormsInteresse" . $row['InteressenID'] . ">";
        }
        print $row['Bezeichnung'];
        echo "</label>";
        echo "<br />";
    }
    echo "</fieldset>";
    echo "</form>";

    $conn = null;
}


