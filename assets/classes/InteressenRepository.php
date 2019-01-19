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
    public function printAllInterest($connection)
    {
        return SichereConnection::execute($connection, "SELECT interessen.Bezeichnung, Interessen.InteressenID
         FROM interessen");
    }

    /**
     * @param $connection
     * @param $user
     * @return array
     */
    public function printUserInterest($connection, $user)
    {
        return SichereConnection::execute($connection, "SELECT interessen.Bezeichnung, Interessen.InteressenID
                          FROM interessen WHERE interessen.InterssenID IN (
                          SELECT userinteressen.Interesse
                          FROM userinteressen
                          WHERE userinteressen.User = '$user->UserID'
                         )");
    }
}