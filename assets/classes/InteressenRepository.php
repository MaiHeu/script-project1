<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 12.01.2019
 * Time: 14:56
 * Klasse die alle Funktionen zu Interessen bietet
 * TODO:PHP Doc erstellen und modifizieren
 */
class InteressenRepository
{
    /**
     * @param $connection
     * @return array
     */
    public function SucheAlle($connection)
    {
        return SichereConnection::Ausfuehren($connection, "SELECT interessen.Bezeichnung, Interessen.InteressenID
         FROM interessen");
    }

    /**
     * @param $connection
     * @param $benutzer
     * @return array
     */
    public function SucheFuerBenutzer($connection, $benutzer)
    {
        return SichereConnection::Ausfuehren($connection, "SELECT interessen.Bezeichnung, Interessen.InteressenID
                          FROM interessen WHERE interessen.InterssenID IN (
                          SELECT userinteressen.Interesse
                          FROM userinteressen
                          WHERE userinteressen.User = '$benutzer->BenutzerID'
                         )");
    }
}