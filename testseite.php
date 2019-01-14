<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 20.12.2018
 * For Testing
 */

include_once 'assets/includes/utilities.php';

$iRepository =new InteresseRepository();
/** @var Interesse $value */
//Herrn Gütling fragen wie man $value in ein Interesse-Objekt wandelt.
foreach ($iRepository->SucheAlle(null) as $value){
    echo $value->Bezeichnung;
}

getUserInterestById(1);
printInterests(0, false);
printInterests(1, true);